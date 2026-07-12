<?php
include("db.php");
include("session_check.php");
if($_SERVER["REQUEST_METHOD"]=="POST")
{
$name = $_POST["fullname"];
$email = $_POST["email"];
$password = $_POST["password"];
$age = $_POST["age"];
$course = $_POST["course"];
$gender = $_POST["gender"];

$fileName = $_FILES["profile"]["name"];
$tempName = $_FILES["profile"]["tmp_name"];
$folder = "uploads/".$fileName;
move_uploaded_file($tempName,$folder);
$sql = "INSERT INTO students(fullname,email,password,age,course,gender,image)
VALUES('$name','$email','$password','$age','$course','$gender','$folder')";
$result = mysqli_query($conn,$sql);
if($result){
    echo "<script>
    alert('Student Registered Successfully');
    window.location='display.php';
    </script>";
    }else{
        echo "Error : ".mysqli_error($conn);
        }
}
?>