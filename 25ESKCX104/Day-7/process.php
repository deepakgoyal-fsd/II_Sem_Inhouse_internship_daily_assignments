<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["fullname"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $age = $_POST["age"];
    $course = $_POST["course"];
    $gender = $_POST["gender"];
} else {
    die("Please submit the form first.");
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Registration Details</title>
<style>
body{
    font-family:Arial;
    background:#f4f4f4;
}
.container{
    width:500px;
    margin:50px auto;
    background:white;
    padding:30px;
    border-radius:10px;
    box-shadow:0 0 10px gray;
}
h2{
    color:green;
    text-align:center;
}
p{
    font-size:18px;
    padding:8px;
}
</style>
</head>
<body>
    <div class="container">
        <h2>Registration Successful</h2>
        <p><strong>Name :</strong> <?php echo $name; ?></p>
        <p><strong>Email :</strong> <?php echo $email; ?></p>
        <p><strong>Password :</strong> <?php echo $password; ?></p>
        <p><strong>Age :</strong> <?php echo $age; ?></p>
        <p><strong>Course :</strong> <?php echo $course; ?></p>
        <p><strong>Gender :</strong> <?php echo $gender; ?></p>
    </div>
</body>
</html>