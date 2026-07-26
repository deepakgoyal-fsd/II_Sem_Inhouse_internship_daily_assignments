<!DOCTYPE html>
<html>
<head>
    <title>Student Data</title>

    <style>
        body{
            font-family: Arial;
            background:#f2f2f2;
        }

        .box{
            width:500px;
            margin:40px auto;
            background:white;
            padding:20px;
            border-radius:10px;
            box-shadow:0 0 10px gray;
        }

        h2{
            text-align:center;
        }

        p{
            font-size:18px;
        }
    </style>
</head>
<body>

<div class="box">

<h2>Registration Details</h2>

<?php

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$gender = $_POST['gender'];
$course = $_POST['course'];
$about = $_POST['about'];

$skills = "";

if(isset($_POST['skills'])){
    $skills = implode(", ", $_POST['skills']);
}

echo "<p><b>Name :</b> $name</p>";
echo "<p><b>Email :</b> $email</p>";
echo "<p><b>Password :</b> $password</p>";
echo "<p><b>Gender :</b> $gender</p>";
echo "<p><b>Course :</b> $course</p>";
echo "<p><b>Skills :</b> $skills</p>";
echo "<p><b>About :</b> $about</p>";

if(isset($_FILES['resume'])){
    echo "<p><b>Resume :</b> ".$_FILES['resume']['name']."</p>";
}

?>

</div>

</body>
</html>