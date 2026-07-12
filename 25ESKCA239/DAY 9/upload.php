<?php

$folder = "uploads/";

if (!is_dir($folder)) {
    mkdir($folder, 0777, true);
}

$branch = isset($_POST["branch"]) ? $_POST["branch"] : "";

if (isset($_FILES["myfile"])) {

    $allowedTypes = ["jpg", "jpeg", "png", "gif", "webp"];

    $extension = strtolower(pathinfo($_FILES["myfile"]["name"], PATHINFO_EXTENSION));

    $maxSize = 20 * 1024 * 1024;

    if (!in_array($extension, $allowedTypes)) {
        die("Only JPG, JPEG, PNG, GIF and WEBP images are allowed.");
    }

    if ($_FILES["myfile"]["size"] > $maxSize) {
        die("Image size must not exceed 20 MB.");
    }

    $newName = time() . "_" . rand(1000,9999) . "." . $extension;

    $targetFile = $folder . $newName;

    if (move_uploaded_file($_FILES["myfile"]["tmp_name"], $targetFile)) {
        echo "Form submitted successfully!<br><br>";
        echo "Values received : <br>";
        echo "Branch: $branch <br>";
        echo "Original file name: " . $_FILES["myfile"]["name"] . "<br>";
        echo "Saved as: $newName <br>";
        echo "File size: " . round($_FILES["myfile"]["size"] / 1024, 2) . " KB <br>";
        echo "<br>Preview: <br>";
        echo "<img src='$targetFile' width='200'>";
    } else {
        echo "Upload failed.";
    }
}
?>
