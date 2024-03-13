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
            $time = date("h:i:s");
            echo "beta 0.2.1 - $time";
            $myjsoncontent = file_get_contents("json/messages.json");
            $messages = json_decode($myjsoncontent, true);

            if ($messages !== null) {
                foreach ($messages as $message) {
                    echo "<div class=\"textbox\">";
                    echo "<h3 class=\"nametext\">";
                    echo "Name User: ", htmlspecialchars($message['name']);
                    echo "</h3>";
                    if (isset($message['image'])) {
                        echo "<img src=\"uploads/", htmlspecialchars($message['image']), "\" alt=\"\" style=\"max-width: 500px; height: auto; margin: 0px; padding: 0px\">";
                    }
                    echo "<p style=\"padding-top: 12.5px; padding-left: 10.4px\">";
                    echo htmlspecialchars($message['message']);
                    echo '</p>';
                    echo "<p style=\"font-size: 10px; text-align: right; margin: 2.5px; padding: 5px\">", htmlspecialchars($message['time']), "</p>";
                    echo "</div>";
                }
            }
            ?>

        </div>
        <div class="messageboxes">
            <form action="submit.php" method="post" enctype="multipart/form-data">
                <input type="file" name="fileToUpload" id="fileToUpload">
                <div class="textboxes">
                    <input type="text" id="name" name="name" placeholder="Type your name">
                    <textarea type="text" id="message" name="message" placeholder="Type a message"></textarea>
                </div>
                <input type="submit" id="submit" name="submit" value="Send">
            </form>
        </div>
    </div>
</body>
<script src="js/general.js"></script>

</html>