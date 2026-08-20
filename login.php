<?php
session_start();
include("includes/db.php");

if(isset($_POST['login']))
{
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $query = "SELECT * FROM admin WHERE username='$username' AND password='$password'";

    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) == 1)
    {
        $_SESSION['admin'] = $username;
        header("Location: admin/dashboard.php");
        exit();
    }
    else
    {
        echo "<script>alert('Invalid Username or Password');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>

<title>Admin Login</title>

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:Arial,sans-serif;
}

body{
background:url("images/skit.jpg") no-repeat center center/cover;
height:100vh;
display:flex;
justify-content:center;
align-items:center;
}

.overlay{
width:100%;
height:100%;
background:rgba(0,0,0,0.6);
display:flex;
justify-content:center;
align-items:center;
}

.login-box{
width:400px;
background:white;
padding:35px;
border-radius:15px;
box-shadow:0 5px 20px rgba(0,0,0,0.5);
}

h2{
text-align:center;
margin-bottom:25px;
color:#0d47a1;
}

input{
width:100%;
padding:12px;
margin:10px 0;
border:1px solid #ccc;
border-radius:5px;
font-size:16px;
}

button{
width:100%;
padding:12px;
background:#0d47a1;
color:white;
border:none;
border-radius:5px;
font-size:18px;
cursor:pointer;
}

button:hover{
background:#1565c0;
}

.back{
text-align:center;
margin-top:15px;
}

.back a{
text-decoration:none;
color:#0d47a1;
font-weight:bold;
}

</style>

</head>

<body>

<div class="overlay">

<div class="login-box">

<h2>Admin Login</h2>

<form method="POST">

<input type="text" name="username" placeholder="Username" required>

<input type="password" name="password" placeholder="Password" required>

<button type="submit" name="login">Login</button>

</form>

<div class="back">
<a href="index.php">← Back to Home</a>
</div>

</div>

</div>

</body>
</html>