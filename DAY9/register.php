<?php
include("db_connect.php");

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$gender = $_POST['gender'];
$course = $_POST['course'];
$address = $_POST['address'];

$photo = $_FILES['photo']['name'];
$temp = $_FILES['photo']['tmp_name'];

if(!is_dir("uploads")){
    mkdir("uploads");
}

move_uploaded_file($temp, "uploads/".$photo);

$sql = "INSERT INTO students
(name, email, phone, gender, course, address, photo)
VALUES
('$name', '$email', '$phone', '$gender', '$course', '$address', '$photo')";

if(mysqli_query($conn, $sql)){
    header("Location: students.php");
    exit();
}
else{
    echo "Error: " . mysqli_error($conn);
}
?>