<?php

session_start();

include "config/database.php";


if(isset($_POST['login']))
{

$username=$_POST['username'];

$password=$_POST['password'];


$query="SELECT * FROM admin 
WHERE username='$username' 
AND password='$password'";


$result=mysqli_query($conn,$query);


if(mysqli_num_rows($result)>0)
{

$_SESSION['admin']=$username;

header("location:dashboard.php");

}
else
{

$error="Invalid Username or Password";

}

}

?>


<!DOCTYPE html>
<html>

<head>

<title>Login</title>

<link rel="stylesheet" href="assets/css/style.css">


<style>

.login-box{

width:400px;

margin:100px auto;

background:white;

padding:40px;

border-radius:20px;

box-shadow:0 10px 30px #ccc;

animation:show 0.5s;

}


.login-box h2{

text-align:center;

margin-bottom:25px;

}



.login-box button{

width:100%;

margin-top:15px;

}



@keyframes show{

from{

opacity:0;

transform:translateY(-30px);

}

to{

opacity:1;

}

}


</style>

</head>


<body>


<div class="login-box">


<h2>
📚 Library Login
</h2>


<?php

if(isset($error))
{

echo "<p style='color:red'>$error</p>";

}

?>


<form method="POST">


<input 
type="text"
name="username"
placeholder="Username"
required>


<br><br>


<input 
type="password"
name="password"
placeholder="Password"
required>


<br>


<button name="login">

Login

</button>


</form>


</div>



</body>

</html>