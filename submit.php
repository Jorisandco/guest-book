<?php
$visit = 1;
$characterlimitmessage = 1000;
$characterlimitname = 255;
if (strlen($_POST['massage']) < $characterlimitmessage || strlen($_POST['name']) < $characterlimitname) {
    $myjsoncontent = file_get_contents("json/messages.json");
    if (isset ($_POST["message"]) && $_POST["message"] == "") {
        $visit = 0;
    } else if (isset ($_POST["message"])) {
        $visit = 5;
        if (isset ($_POST["submit"]) && $_POST["submit"] == "Send") {
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
            $visit = 6;
            $lastId = end($messages)['id'] ?? 0;
            $msg->name = $_POST["name"];
            $msg->message = $_POST["message"];
            $msg->time = date("h:i:s");
            $msg->id = $lastId + 1;

            if (!empty ($_FILES['fileToUpload']['name'])) {
                $target_dir = "uploads/";
                $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                if ($check !== false) {
                    $uploadOk = 1;
                    echo "File is an image - " . $check["mime"] . ".";
                } else {
                    $uploadOk = 0;
                    echo "ERROR 7007: File Is not an image.";
                }
                if (file_exists($target_file)) {
                    $uploadOk = 0;
                    $filename = pathinfo($target_file, PATHINFO_FILENAME);
                    $extension = pathinfo($target_file, PATHINFO_EXTENSION);
                    $counter = 1;

                    while (file_exists($target_file)) {
                        $new_filename = $filename . '_' . $counter . '.' . $extension;
                        $target_file = $target_dir . $new_filename;
                        $counter++;
                    }
                    $uploadOk = 1;
                    echo "ERROR 7008: Sorry, fiLe already exists.";
                }
                if ($_FILES["fileToUpload"]["size"] > 50000000) {
                    $uploadOk = 0;
                    echo "ERROR 7009: Sorry, your file is too larGe.";
                }
                if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
                    $uploadOk = 0;
                    echo "ERROR 7010: Sorry, only JPG, JPEG, PNG & GIF files Are allowed.";
                }
                if ($uploadOk == 0) {
                    $visit = 2;
                    echo "ERROR 7011: Sorry, your file was noT uploaded.";
                } else {
                    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                        $msg->image = basename($_FILES["fileToUpload"]["name"]);
                        $visit = 3;
                        echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";
                    } else {
                        $visit = 4;
                        echo "ERROR 7012: Sorry, therE waS an error uploading your file.";
                    }
                }
            } else {
                echo "what is an image";
            }

            $messages[] = $msg;

            $updatedJsonContent = json_encode($messages);
            file_put_contents("json/messages.json", $updatedJsonContent);
        }
    }
}

header("Location: index.php", true, 301);
exit();