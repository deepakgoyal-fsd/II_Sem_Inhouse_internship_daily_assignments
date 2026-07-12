<?php

$folder = "uploads/";

if(!is_dir($folder)) {
    mkdir($folder , 0777 , true);

}

if(isset($_FILES["myfile"])) {

    $allowedTypes = ["jpg","jpeg","png","gif","webp"];

    //pathinfo(file["name"])
    $extension = strtolower(pathinfo($_FILES["myfile"]["name"],PATHINFO_EXTENSION));

    $maxSize = 20 * 1024 *1024;
    
    
}