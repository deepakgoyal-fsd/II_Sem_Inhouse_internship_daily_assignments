<?php

if($_SERVER["REQUEST_METHOD"]=="POST")
{

$name=trim($_POST['name']);
$email=trim($_POST['email']);
$mobile=trim($_POST['mobile']);
$college=trim($_POST['college']);
$branch=trim($_POST['branch']);

if(empty($name) || empty($email) || empty($mobile) || empty($college) || empty($branch))
{
die("All fields are required.");
}

if(!preg_match("/^[A-Za-z ]+$/",$name))
{
die("Invalid Name");
}

if(!filter_var($email,FILTER_VALIDATE_EMAIL))
{
die("Invalid Email");
}

if(!preg_match("/^[0-9]{10}$/",$mobile))
{
die("Invalid Mobile Number");
}

?>

<!DOCTYPE html>

<html>

<head>

<title>Registration Successful</title>

<style>

body{

background:linear-gradient(135deg,#43cea2,#185a9d);

font-family:Arial;

display:flex;

justify-content:center;

align-items:center;

height:100vh;

}

.box{

background:white;

padding:35px;

border-radius:15px;

box-shadow:0 10px 25px rgba(0,0,0,.3);

width:450px;

text-align:center;

}

h2{

color:green;

margin-bottom:20px;

}

p{

font-size:18px;

margin:8px;

}

a{

display:inline-block;

margin-top:20px;

padding:10px 20px;

background:#0d6efd;

color:white;

text-decoration:none;

border-radius:8px;

}

a:hover{

background:#084298;

}

</style>

</head>

<body>

<div class="box">

<h2>Registration Successful ✅</h2>

<p><b>Name :</b> <?php echo htmlspecialchars($name); ?></p>

<p><b>Email :</b> <?php echo htmlspecialchars($email); ?></p>

<p><b>Mobile :</b> <?php echo htmlspecialchars($mobile); ?></p>

<p><b>College :</b> <?php echo htmlspecialchars($college); ?></p>

<p><b>Branch :</b> <?php echo htmlspecialchars($branch); ?></p>

<a href="index.php">Back</a>

</div>

</body>

</html>

<?php

}

?>