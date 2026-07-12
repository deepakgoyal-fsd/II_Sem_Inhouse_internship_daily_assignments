<?php
include("db.php");

$name = $_POST['name'];
$email = $_POST['email'];
$branch = $_POST['branch'];
$cgpa = $_POST['cgpa'];
$status = $_POST['status'];

$photo = "";

if(isset($_FILES['photo']) && $_FILES['photo']['name'] != "")
{
    $photo = $_FILES['photo']['name'];
    $temp = $_FILES['photo']['tmp_name'];

    move_uploaded_file($temp, "uploads/" . $photo);
}

$sql = "INSERT INTO student(name, email, branch, cgpa, photo, status)
VALUES('$name', '$email', '$branch', '$cgpa', '$photo', '$status')";

if(mysqli_query($conn, $sql))
{
    echo "Student Added Successfully";
}
else
{
    echo "Error: " . mysqli_error($conn);
}

mysqli_close($conn);
?>