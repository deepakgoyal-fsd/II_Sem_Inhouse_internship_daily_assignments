<?php

$host = "localhost";
$username = "root";
$password = "";
$database = "studentdb";

$conn = mysqli_connect($host, $username, $password, $database);

if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
}

if(isset($_POST['register'])){

    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $course = $_POST['course'];

    $sql = "INSERT INTO students(name,email,phone,course)
            VALUES('$name','$email','$phone','$course')";

    if(mysqli_query($conn, $sql)){
        echo "<script>alert('Student Registered Successfully!');</script>";
    }else{
        echo "<script>alert('Registration Failed!');</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Student Registration System</title>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:Arial, sans-serif;
}

body{
    background:#f2f2f2;
    display:flex;
    justify-content:center;
    align-items:center;
    min-height:100vh;
}

.container{
    width:400px;
    background:white;
    padding:25px;
    border-radius:10px;
    box-shadow:0 0 10px rgba(0,0,0,0.2);
}

h2{
    text-align:center;
    margin-bottom:20px;
}

input,
select{
    width:100%;
    padding:10px;
    margin:10px 0;
    border:1px solid #ccc;
    border-radius:5px;
}

button{
    width:100%;
    padding:12px;
    background:#007bff;
    color:white;
    border:none;
    border-radius:5px;
    cursor:pointer;
    font-size:16px;
}

button:hover{
    background:#0056b3;
}

</style>
</head>

<body>

<div class="container">

<h2>Student Registration</h2>

<form method="POST">

<input type="text" name="name" placeholder="Full Name" required>

<input type="email" name="email" placeholder="Email" required>

<input type="text" name="phone" placeholder="Phone Number" required>

<select name="course" required>
    <option value="">Select Course</option>
    <option>B.Tech</option>
    <option>BCA</option>
    <option>B.Sc</option>
    <option>BBA</option>
</select>

<button type="submit" name="register">
    Register
</button>

</form>

</div>

</body>
</html>