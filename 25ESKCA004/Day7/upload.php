<?php

$folder="uploads/";

if(!is_dir($folder)){
    mkdir($folder,0777,true);
    
}
if (isset($_FILES["myfile"])) {
    $maxSize = 20;
    if ($_FILES["myfile"]["size"] > $maxSize) {
        die("Maximum allowed file size is 20 MB.");
    }

    $allowedTypes = ["jpg", "jpeg", "png", "gif", "webp"];

    $extension = strtolower(pathinfo($_FILES["myfile"]["name"], PATHINFO_EXTENSION));

    // 20 MB
    $maxSize = 20 * 1024 * 1024;

    if (!in_array($extension, $allowedTypes)) {
        die("Only JPG, JPEG, PNG, GIF and WEBP images are allowed.");
    }
}