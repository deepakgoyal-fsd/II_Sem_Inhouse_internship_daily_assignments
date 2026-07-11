<?php
$name =$_POST['name'];
$age=$_POST['age'];
$phonenumber=$_POST['phonenumber'];
$cgpa=$_POST['cgpa'];
$other=$_POST['other'];

if(empty($name)){
  echo " name is empty <br>";
}
$folder ="uoploads/";
if(!is_dir($folder)){
  mkdir($folder, 0777,true);
}
  if(isset($_FILES["myfile"])){
    $allowedTypes=["jpg", "jpeg", "png", "gif", "webp"];
  }

    //pathinfo(file["name"])
    $extension=strtolower(pathinfo($_FILES["myfile"]["name"],PATHINFO_EXTENSION));
    $maxSize = 20 * 1024 *1024;
     if(!in_array($extension, $allowedTypes)){
     die("only JPG,JPEG,PNG,GIF and WEBP images are allowed."); 
     }
     if($_FILES["myfile"]["size"]>$maxSize){
      die("images Size must not exceed 20 MB.");
     }
     $newName = time() . "_".
      rand(1000,9999) . "." .
      $extension;

     $targetFile = $folder . $newName;

     if(move_uploaded_file($_FILES["myfile"]["tmp_name"],
     $targetFile)){
     echo "Image upload successfully.";
  }
     else{
      echo "upload failed.";
}
 
echo "values received :$name $cgpa $age $phonenumber $other";
?>