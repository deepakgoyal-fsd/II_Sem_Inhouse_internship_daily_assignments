<?php

include("db_connect.php");

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$cgpa = $_POST['cgpa'];
$gender = $_POST['gender'];
$course = $_POST['course'];
$status = $_POST['status'];
$address = $_POST['address'];

$photo = $_FILES['photo']['name'];
$temp = $_FILES['photo']['tmp_name'];

if(!is_dir("uploads")){
    mkdir("uploads");
}

move_uploaded_file($temp, "uploads/".$photo);

$sql = "INSERT INTO students
(name,email,phone,cgpa,gender,course,status,address,photo)
VALUES
('$name','$email','$phone','$cgpa','$gender','$