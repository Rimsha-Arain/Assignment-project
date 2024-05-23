<?php
$uploadDirectory = "uploads/";

if (isset($_POST['submit'])) {
    $files = $_FILES['files'];

    // Loop through each file
    for ($i = 0; $i < count($files['name']); $i++) {
        $fileName = basename($files['name'][$i]);
        $fileTmpName = $files['tmp_name'][$i];
        $fileSize = $files['size'][$i];
        $fileError = $files['error'][$i];
        $fileType = $files['type'][$i];

        // Check if there was an error during upload
        if ($fileError === 0) {
            // Create the destination path
            $fileDestination = $uploadDirectory . $fileName;

            // Move the file to the upload directory
            if (move_uploaded_file($fileTmpName, $fileDestination)) {
                echo "File " . htmlspecialchars($fileName) . " uploaded successfully!<br>";
            } else {
                echo "There was an error moving the uploaded file " . htmlspecialchars($fileName) . ".<br>";
            }
        } else {
            echo "There was an error uploading your file " . htmlspecialchars($fileName) . ".<br>";
        }
    }
} else {
    echo "No files were uploaded.";
}
?>
