<?php
if(!isset($errors)){
    $errors = [];
}

if(!isset($uploadedFileName)){
    $uploadedFileName = "";
}

if(isset($_FILES["myfile"]) && $_FILES["myfile"]["error"] !== UPLOAD_ERR_NO_FILE){
    if($_FILES["myfile"]["error"] !== UPLOAD_ERR_OK){
        $errors[] = "File upload failed";
    }
    else{
        $folder = "upload/";
        $allowedTypes = ["jpg", "jpeg", "png", "gif", "webp"];
        $extension = strtolower(pathinfo($_FILES["myfile"]["name"], PATHINFO_EXTENSION));
        $maxSize = 20 * 1024 * 1024;

        if(!in_array($extension, $allowedTypes)){
            $errors[] = "Only JPG, JPEG, PNG, GIF and WEBP files are allowed";
        }
        elseif($_FILES["myfile"]["size"] > $maxSize){
            $errors[] = "Image size must not exceed 20 MB";
        }
        else{
            if(!is_dir($folder)){
                mkdir($folder, 0777, true);
            }

            $uploadedFileName = time() . "_" . rand(1000, 9999) . "." . $extension;
            $targetFile = $folder . $uploadedFileName;

            if(!move_uploaded_file($_FILES["myfile"]["tmp_name"], $targetFile)){
                $errors[] = "Unable to save uploaded file";
                $uploadedFileName = "";
            }
        }
    }
}
?>
