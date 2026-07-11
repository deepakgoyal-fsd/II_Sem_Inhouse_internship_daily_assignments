<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Student Registration Form</title>

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:Arial, Helvetica, sans-serif;
}

body{
background:linear-gradient(135deg,#4facfe,#00f2fe);
display:flex;
justify-content:center;
align-items:center;
height:100vh;
}

.container{
width:430px;
background:white;
padding:30px;
border-radius:15px;
box-shadow:0 15px 30px rgba(14, 13, 13, 0.3);
}

h2{
text-align:center;
color:#0d47a1;
margin-bottom:20px;
}

.logo{
display:block;
margin:auto;
width:90px;
margin-bottom:10px;
}

label{
font-weight:bold;
color:#333;
}

input{
width:100%;
padding:11px;
margin-top:5px;
margin-bottom:15px;
border:1px solid #645e5e;
border-radius:8px;
font-size:15px;
transition:.3s;
}

input:focus{
border:1px solid #2196f3;
box-shadow:0 0 8px #64b5f6;
outline:none;
}

.button{
display:flex;
gap:10px;
}

input[type=submit]{
background:#0d6efd;
color:white;
font-weight:bold;
cursor:pointer;
border:none;
}

input[type=submit]:hover{
background:#084298;
}

input[type=reset]{
background:#dc3545;
color:white;
font-weight:bold;
cursor:pointer;
border:none;
}

input[type=reset]:hover{
background:#b02a37;
}

</style>

</head>

<body>

<div class="container">

<!-- College Logo -->
<img src="logo.png" class="logo">

<h2>Student Registration</h2>

<form action="process.php" method="POST">

<label>Full Name</label>
<input type="text"
name="name"
pattern="[A-Za-z ]{3,30}"
title="Only alphabets allowed"
required>

<label>Email</label>
<input type="email"
name="email"
required>

<label>Mobile Number</label>
<input type="tel"
name="mobile"
pattern="[0-9]{10}"
title="Enter 10 digit mobile number"
required>

<label>College Name</label>
<input type="text"
name="college"
required>

<label>Branch</label>
<input type="text"
name="branch"
required>

<div class="button">

<input type="submit" value="Register">

<input type="reset" value="Reset">

</div>

</form>

</div>

</body>
</html>