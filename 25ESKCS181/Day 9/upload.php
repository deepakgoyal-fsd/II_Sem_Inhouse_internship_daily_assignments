<?php

$folder = "uploads/";

if(!is_dir($folder)){
    mkdir($folder, 0777, true);
}

if(isset($_FILES['myFile'])){

    $allowedTypes = ["jpg", "jpeg", "png", "gif", "webp"];
    $extension = strtolower(pathinfo($_FILES['myFile']['name'], PATHINFO_EXTENSION));

    $maxSize = 20 * 1024 * 1024;

    if(!in_array($extension, $allowedTypes)){
        die("Only JPG, JPEG, PNG, GIF, and WEBP files are allowed.");
    }

    if($_FILES['myFile']['size'] > $maxSize){
        die("File size exceeds the maximum limit of 20MB.");
    }

    $newName = time() . "_" . rand(1000, 9999) . "." . $extension;

    $targetFile = $folder . $newName;

    if(move_uploaded_file($_FILES['myFile']['tmp_name'], $targetFile)){
        echo "Image uploaded successfully: " . $newName;
    } else {
        echo "Error uploading file.";
    }

}

?>
