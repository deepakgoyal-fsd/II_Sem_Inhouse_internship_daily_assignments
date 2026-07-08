<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "skit";

$conn = mysqli_connect($servername,$username,$password,$database);

if(!$conn)
{
    die("Connection Failed : ".mysqli_connect_error());
}

if($_SERVER["REQUEST_METHOD"]=="POST")
{

$rollno = mysqli_real_escape_string($conn,$_POST['rollno']);
$name = mysqli_real_escape_string($conn,$_POST['name']);
$branch = mysqli_real_escape_string($conn,$_POST['branch']);
$phone = mysqli_real_escape_string($conn,$_POST['phone']);
$section = mysqli_real_escape_string($conn,$_POST['section']);
$email = mysqli_real_escape_string($conn,$_POST['email']);
$city = mysqli_real_escape_string($conn,$_POST['city']);
$state = mysqli_real_escape_string($conn,$_POST['state']);
$country = mysqli_real_escape_string($conn,$_POST['country']);
$address1 = mysqli_real_escape_string($conn,$_POST['address1']);
$address2 = mysqli_real_escape_string($conn,$_POST['address2']);

$sql="INSERT INTO student
(`Roll No.`,
`Name`,
`Branch`,
`Phone No.`,
`Section`,
`Email`,
`City`,
`State`,
`Country`,
`Address 1`,
`Address 2`)

VALUES

('$rollno',
'$name',
'$branch',
'$phone',
'$section',
'$email',
'$city',
'$state',
'$country',
'$address1',
'$address2')";

echo "<h3>SQL Query:</h3>";
echo "<pre>$sql</pre>";

$result = mysqli_query($conn, $sql);

if($result)
{

echo '

<!DOCTYPE html>

<html>

<head>

<title>Success</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:Poppins,sans-serif;
}

body{

display:flex;
justify-content:center;
align-items:center;
height:100vh;

background:linear-gradient(135deg,#6a11cb,#2575fc);

}

.box{

background:rgba(255,255,255,.15);
backdrop-filter:blur(15px);
padding:40px;
border-radius:20px;
text-align:center;
color:white;
box-shadow:0 10px 30px rgba(0,0,0,.3);

}

h1{

font-size:35px;
margin-bottom:20px;

}

p{

font-size:18px;

}

a{

display:inline-block;
margin-top:25px;
padding:12px 25px;
background:#ff416c;
color:white;
text-decoration:none;
border-radius:10px;

}

a:hover{

background:#ff4b2b;

}

</style>

</head>

<body>

<div class="box">

<h1>✅ Registration Successful</h1>

<p>Your record has been saved into the database.</p>

<a href="student.html">Register Another Student</a>

</div>

</body>

</html>

';

}
else
{

echo "Error : ".mysqli_error($conn);

}

}

mysqli_close($conn);

?>