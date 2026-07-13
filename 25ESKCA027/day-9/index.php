<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>CodeSphere Enrollment</title>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:"Poppins",sans-serif;
}

body{

    background:#eef3fb;

    height:100vh;

    display:flex;
    justify-content:center;
    align-items:center;

}

.container{

    width:430px;

    background:white;

    padding:35px;

    border-radius:15px;

    box-shadow:0 12px 28px rgba(0,0,0,.18);

}

h2{

    text-align:center;

    margin-bottom:25px;

    color:#1d4ed8;

}

label{

    display:block;

    margin-top:15px;

    font-weight:600;

    color:#374151;

}

input{

    width:100%;

    padding:12px;

    margin-top:6px;

    border:1px solid #d1d5db;

    border-radius:8px;

    outline:none;

    transition:.3s;

}

input:focus{

    border-color:#2563eb;

    box-shadow:0 0 8px rgba(37,99,235,.2);

}

input[type="submit"]{

    margin-top:25px;

    background:#2563eb;

    color:white;

    border:none;

    cursor:pointer;

    font-weight:600;

}

input[type="submit"]:hover{

    background:#1e40af;

}

</style>

</head>

<body>

<div class="container">

<h2>

CodeSphere Registration

</h2>

<form action="process.php" method="POST">

<label>Student Name</label>

<input
type="text"
name="name"
placeholder="Enter full name"
required>

<label>Email Address</label>

<input
type="email"
name="email"
placeholder="Enter email"
required>

<label>Specialization</label>

<input
type="text"
name="branch"
placeholder="Enter specialization"
required>

<label>Institute</label>

<input
type="text"
name="college"
placeholder="Enter institute name"
required>

<input
type="submit"
name="submit"
value="Enroll Now">

</form>

</div>

</body>

</html>