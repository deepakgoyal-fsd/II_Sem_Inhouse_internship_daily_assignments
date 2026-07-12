<?php

include('db_connect.php');

$name = $_POST['name'];

$email = $_POST["email"];
$phoneNumber = $_POST["phoneNumber"];
$branch = $_POST["branch"];



if(empty($name)){
    echo "email is empty <br>";

}
if (!filter_var($email,FILTER_VALIDATE_EMAIL)){
    echo "email is invalid";

}
if(!is_numeric($phoneNumber)){
    echo "invalid phone number";
}
echo "Values receieved : $name $email $phoneNumber $branch";


$folder = "uploads/";

if(!is_dir($folder)){
    mkdir($folder, 0777, true);

}
if(isset($_FILES["myfile"])){

$allowedTypes = ["jpg" , "jpeg" , "png" , "gif" ,"webp"];
//pathinfo(file["name])
$extension = strtolower(pathinfo($_FILES["myfile"]["name"],PATHINFO_EXTENSION));
$maxSize = 20 * 1024 * 1024;
if (!in_array($extension, $allowedTypes)){
    die("Only JPG, JPEG, PNG, GIF and WEBP images are allowed.");

}
if ($_FILES["myfile"]["size"]> $maxSize){
    die("Images size must not exceed 20 MB.");
    
}
$newName = time() . "_" . rand(1000,9999) . "." . $extension;

$targetFile = $folder . $newName;
if (move_uploaded_file($_FILES["myfile"]["tmp_name"], $targetFile)){
    echo("Images uploaded successfully.");
    
}else{
    echo"Upload failed.";
}



if($_SERVER['REQUEST_METHOD'] == 'POST'){
$name = mysqli_real_escape_string($conn, $_POST['name']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$phoneNumber= mysqli_real_escape_string($conn, $_POST['phoneNumber']);
$branch = mysqli_real_escape_string($conn, $_POST['branch']);

$sql = "INSERT INTO user (name  , phoneNumber ,branch)
VALUES('$name' ,'$phoneNumber', '$branch')";
if(mysqli_query($conn, $sql)){
  echo "Student Registered Successfully!";


}else{
    echo "Error: " . mysqli_error($conn);


}

}



}
?>