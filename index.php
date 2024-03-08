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
            $myjsoncontent = file_get_contents("json/messages.json");
            $messages = json_decode($myjsoncontent, true);

            if ($messages !== null) {
                foreach ($messages as $message) {
                    echo "<div class=\"textbox\">";
                    echo "<div>";
                    echo "<h3 class=\"nametext\">";
                    echo "Name User: ", htmlspecialchars($message['name']);
                    echo "</h3>";
                    echo "</div>";
                    echo "<br><div>";
                    echo "<p>";
                    echo htmlspecialchars($message['message']);
                    echo '</p>';
                    echo '</div>';
                    echo "</div>";
                }
            }
            ?>

        </div>
        <div class="messageboxes">
            <form action="submit.php" method="POST">
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