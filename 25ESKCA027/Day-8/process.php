<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<title>Enrollment Complete</title>

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:'Poppins',sans-serif;
}

body{

min-height:100vh;
display:flex;
justify-content:center;
align-items:center;
background:linear-gradient(135deg,#0f172a,#2563eb);

}

.card{

background:white;
width:500px;
padding:35px;
border-radius:18px;
box-shadow:0 18px 35px rgba(0,0,0,.25);

}

h1{

text-align:center;
color:#2563eb;
margin-bottom:20px;

}

.details{

background:#f4f8ff;
padding:20px;
border-radius:12px;

}

.details p{

font-size:17px;
margin:12px 0;
color:#333;

}

span{

font-weight:bold;
color:#1d4ed8;

}

.btn{

display:block;
text-align:center;
margin-top:25px;
padding:12px;
background:#2563eb;
color:white;
text-decoration:none;
border-radius:10px;
transition:.3s;

}

.btn:hover{

background:#1d4ed8;

}

</style>

</head>

<body>

<div class="card">

<h1>

Enrollment Completed 🎉

</h1>

<div class="details">

<?php

$name=$_POST['name'];
$email=$_POST['email'];
$password=$_POST['password'];
$phone=$_POST['phone'];
$gender=$_POST['gender'];
$address=$_POST['address'];

if(isset($_POST['hobbies']))
{
    $hobbies=implode(", ",$_POST['hobbies']);
}
else
{
    $hobbies="No interests selected";
}

echo "<p><span>Student Name:</span> $name</p>";

echo "<p><span>Email ID:</span> $email</p>";

echo "<p><span>Password:</span> $password</p>";

echo "<p><span>Mobile Number:</span> $phone</p>";

echo "<p><span>Gender:</span> $gender</p>";

echo "<p><span>Interests:</span> $hobbies</p>";

echo "<p><span>Residential Address:</span> $address</p>";

?>

</div>

<a class="btn" href="index.php">

Back to Registration

</a>

</div>

</body>

</html>