<?php

$folder ="uploads/";
if(!is_dir($folder)){
    mkdir($folder,0777, true);
}

if(isset($_FILES["myfile"])){
    $allowedTypes = ["jpg", "jpeg", "png", "gif", "webp"];

    //pathinfo(file["name]")
    $extension = strtolower(pathinfo($_FILES["myfile"]["name"], PATHINFO_EXTENSION));

    //20 MB
    $maxSize = 20*1024*1024;
    if(!in_array($extension, $allowedTypes)){
        die("ONLY JPG, JPEG, PNG, GIF AND WEBP IMAGES ARE ALLOWED");
    }
    if($_FILES["myfile"]["size"] > $maxSize) {
        die("Image size must not exceed 20MB");
    }

    $newName = time() . "_" . rand(1000,9999) . "." . $extension;
    
    $targetFIle = $folder . $newName;

    if(move_uploaded_file($_FILES["myfile"]["tmp_name"],$targetFile)){
        echo"Image Uploaded Successfully";
    }
    else{
        echo "upload failed";
    }
}
?>