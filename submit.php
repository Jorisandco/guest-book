<?php
$visit = 1;
$myjsoncontent = file_get_contents("json/messages.json");
if (isset($_POST["message"]) && $_POST["message"] == "") {
    $visit = 0;
} else if (isset($_POST["message"])) {
    $visit = 5;
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
        $existingnames = array_column($messages, 'name');
        if (in_array($_POST["message"], $existingMessages) && in_array($_POST["name"], $existingnames) && end($messages)['id'] ?? 0 == $existingIds) {
            $visit = 7;
            $myjsoncontent = file_get_contents("json/messages.json");
            $messages = json_decode($myjsoncontent, true);
        } else {
            $visit = 6;
            $lastId = end($messages)['id'] ?? 0;
            $msg->name = $_POST["name"];
            $msg->message = $_POST["message"];
            $msg->id = $lastId + 1;

            $messages[] = $msg;

            $updatedJsonContent = json_encode($messages);
            file_put_contents("json/messages.json", $updatedJsonContent);
        }
    }
}
header("Location: index.php", true, 301);  
exit();
?>