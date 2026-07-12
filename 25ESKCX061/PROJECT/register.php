<?php

include ("db.php");

$email=$_POST['email'];
$password=password_hash($_POST['password'],PASSWORD_DEFAULT);

$fullname=$_POST['fullname'];
$dob=$_POST['dob'];
$gender=$_POST['gender'];
$phone=$_POST['phone'];
$address=$_POST['address'];
$city=$_POST['city'];

$college=$_POST['college'];
$course=$_POST['course'];
$branch=$_POST['branch'];
$semester=$_POST['semester'];
$cgpa=$_POST['cgpa'];
$skills=$_POST['skills'];
$about=$_POST['about'];

$sql = "INSERT INTO students(email,password,fullname,dob,gender,phone,address,city,college,course,branch,semester,cgpa,skills,about) 
        VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param(
    "sssssssssssidss",
    $email, $password, $fullname, $dob, $gender, $phone, $address, $city,
    $college, $course, $branch, $semester, $cgpa, $skills, $about
);

if ($stmt->execute())
{
    header("Location: success.php");
}
else
{
    echo "Registration Failed: " . $stmt->error;
}
?>
