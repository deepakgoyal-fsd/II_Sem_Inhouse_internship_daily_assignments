<?php

include "db.php";

$errors = [];

$name = trim($_POST["name"]);
$email = trim($_POST["email"]);
$phone = trim($_POST["phone"]);
$gender = $_POST["gender"] ?? "";
$course = $_POST["course"];
$address = trim($_POST["address"]);

$photo = "";

if(isset($_FILES["photo"]) && $_FILES["photo"]["name"] != "")
{
    $photo = time() . "_" . $_FILES["photo"]["name"];
    move_uploaded_file($_FILES["photo"]["tmp_name"], "uploads/" . $photo);
}

if(!preg_match("/^[a-zA-Z ]+$/",$name))
{
    $errors[]="Name should contain only letters.";
}

if(strlen($address)<10)
{
    $errors[]="Address must be at least 10 characters.";
}

if(empty($gender))
{
    $errors[]="Please select gender.";
}

if(!filter_var($email,FILTER_VALIDATE_EMAIL))
{
    $errors[]="Invalid email address.";
}

if(!preg_match("/^[0-9]{10}$/",$phone))
{
    $errors[]="Phone number must be exactly 10 digits.";
}

if(count($errors)>0)
{

echo "<h2>Validation Errors</h2>";

echo "<ul>";

foreach($errors as $error)
{
    echo "<li>$error</li>";
}

echo "</ul>";

echo "<a href='index.php'>Go Back</a>";

exit();

}

$sql="INSERT INTO students(name,email,phone,gender,course,address,photo)
VALUES('$name','$email','$phone','$gender','$course','$address','$photo')";

if(mysqli_query($conn,$sql))
{

echo "<h2>Registration Successful</h2>";

echo "<p>Name : $name</p>";

echo "<p>Email : $email</p>";

echo "<p>Phone : $phone</p>";

echo "<p>Gender : $gender</p>";

echo "<p>Course : $course</p>";

echo "<p>Address : $address</p>";

if($photo!="")
{
    echo "<img src='uploads/$photo' width='180'>";
}

echo "<br><br>";

echo "<a href='index.php'>Register Another Student</a>";

}

else
{

echo "Error : ".mysqli_error($conn);

}

mysqli_close($conn);

?>