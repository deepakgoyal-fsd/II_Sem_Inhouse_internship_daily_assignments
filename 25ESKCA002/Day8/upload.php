<?php

$folder = "uploads/";

if(!is_dir($folder)){
    mkdir($folder, 0777, true);
}

if(!isset($_FILES['ProfilePicture'])) {
    $allowedTypes = ['jpg', 'jpeg', 'png', 'gif', 'bmp', 'webp'];

    $extension = strtolower(pathinfo($_FILES['ProfilePicture']['name'], PATHINFO_EXTENSION));

    $maxSize = 20 * 1024 * 1024;

    if(!in_array($extension, $allowedTypes)) {
        die("Only JPG,JPEG,PNG,GIF,BMP,WEBP files are allowed.");
    }

    if($_FILES["ProfilePicture"]["size"]){
        die("Image size must not exceed 20MB.");
    }

    $newName = time() . "_" . rand(1000, 9999) . "." . $extension;
    $targetFile = $folder . $newName;

    if(move_uploaded_file($_FILES["ProfilePicture"]["tmp_name"], $targetFile)) {
        echo "Image uploaded successfully.";
    }
    else {
        echo "Error uploading image.";
    }
}