<?php

$folder = "uploads/";

// Create uploads folder if it does not exist
if (!is_dir($folder)) {
    mkdir($folder, 0777, true);
}

if (isset($_FILES["myfile"])) {

    // Allowed image types
    $allowedTypes = ["jpg", "jpeg", "png", "gif", "webp"];

    // Get file extension
    $extension = strtolower(pathinfo($_FILES["myfile"]["name"], PATHINFO_EXTENSION));

    // Maximum size = 20 MB
    $maxSize = 20 * 1024 * 1024;

    // Check image type
    if (!in_array($extension, $allowedTypes)) {
        die("Only JPG, JPEG, PNG, GIF and WEBP images are allowed.");
    }

    // Check image size
    if ($_FILES["myfile"]["size"] > $maxSize) {
        die("Image size must not exceed 20 MB.");
    }

    // Create unique file name
    $newName = time() . "_" . rand(1000,9999) . "." . $extension;

    // Destination path
    $targetFile = $folder . $newName;

    // Move uploaded file
    if (move_uploaded_file($_FILES["myfile"]["tmp_name"], $targetFile)) {
        echo "Image uploaded successfully.<br>";
        echo "Saved as: " . $newName;
    } else {
        echo "Image upload failed.";
    }

} else {
    echo "Please select an image.";
}

?>