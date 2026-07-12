<?php

if (isset($_FILES["image"])) {

    $folder = "uploads/";

    $allowedTypes = ["jpg", "jpeg", "png", "gif", "webp"];
    $maxSize = 20 * 1024 * 1024; // 20 MB

    $extension = strtolower(pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION));

    if (!in_array($extension, $allowedTypes)) {
        die("Only JPG, JPEG, PNG, GIF and WEBP images are allowed.");
    }

    if ($_FILES["image"]["size"] > $maxSize) {
        die("Image size must not exceed 20 MB.");
    }

    $newName = time() . "_" . rand(1000, 9999) . "." . $extension;

    $targetFile = $folder . $newName;

    if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
        echo "Image uploaded successfully.";
    } else {
        echo "Upload failed.";
    }

}
?>