<?php

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$gender = $_POST['gender'];
$course = $_POST['course'];
$branch = $_POST['branch'];
$college = $_POST['college'];
$cgpa = $_POST['cgpa'];
$address = $_POST['address'];

if($name==""){
    echo "Name is required";
}
else{
    echo "<h2>Registration Successful</h2>";

    echo "Name : ".$name."<br><br>";
    echo "Email : ".$email."<br><br>";
    echo "Phone : ".$phone."<br><br>";
    echo "Gender : ".$gender."<br><br>";
    echo "Course: ".$course."<br><br>";
    echo "Branch : ".$branch."<br><br>";
    echo "College : ".$college."<br><br>";
    echo "CGPA : ".$cgpa."<br><br>";
    echo "Address : ".$address."<br><br>";
}
?>
