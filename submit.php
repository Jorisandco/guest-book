<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>messages</title>
    <link rel="stylesheet" href="css/css.css">

</head>

<body>
    <div class="container">
        <div class="messages">
            <?php
            $visit = 1;

            if (isset($_POST["message"]) && $_POST["message"] == "") {
                $myjsoncontent = file_get_contents("json/messages.json");
                $messages = json_decode($myjsoncontent, true);
                $visit = 0;
            } else if (isset($_POST["message"]) && $_POST["message"]) {
                if (isset($_POST["submit"]) && $_POST["submit"] == "Send") {
                    $msg = new stdClass();
                    $myjsoncontent = file_get_contents("json/messages.json");
                    $messages = json_decode($myjsoncontent, true);

                    if ($messages === null) {
                        $messages = [];
                    }

                    // Check if id already exists
                    $existingIds = array_column($messages, 'id');
                    $existingMessages = array_column($messages, 'message');
                    if (in_array($_POST["message"], $existingMessages) && end($messages)['id'] ?? 0 == $existingIds) {
                        $myjsoncontent = file_get_contents("json/messages.json");
                        $messages = json_decode($myjsoncontent, true);
                    } else {
                        $lastId = end($messages)['id'] ?? 0;
                        $msg->name = $_POST["name"];
                        $msg->message = $_POST["message"];
                        $msg->id = $lastId + 1;

                        $messages[] = $msg;

                        $updatedJsonContent = json_encode($messages);
                        file_put_contents("json/messages.json", $updatedJsonContent);

                        $myjsoncontent = file_get_contents("json/messages.json");
                        $messages = json_decode($myjsoncontent, true);


                    }
                }
            }

            if ($messages !== null) {
                foreach ($messages as $message) {
                    echo "<div class=\"textbox\">";
                    echo "<div>";
                    echo "<h3>";
                    echo $message['name'];
                    echo "</h3>";
                    echo "</div>";
                    echo "<br><div>";
                    echo "<p>";
                    echo $message['message'];
                    echo '</p>';
                    echo '</div>';
                    echo "</div>";
                }
            }
            ?>
        </div>
        <div class="messageboxes">
            <form action="index.php" method="POST">
                <input type="text" id="message" name="name" placeholder="Type your name">
                <input type="text" id="message" name="message" placeholder="Type a message">
                <input type="submit" id="sum" name="submit" value="Send">
            </form>
        </div>
    </div>

</body>
<script src="js/general.js"></script>

</html>