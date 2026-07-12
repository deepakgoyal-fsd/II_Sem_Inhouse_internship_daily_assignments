<?php

include("db_connect.php");

if($_SERVER["REQUEST_METHOD"]=="POST"){

$name=mysqli_real_escape_string($conn,$_POST['name']);
$email=mysqli_real_escape_string($conn,$_POST['email']);
$branch=mysqli_real_escape_string($conn,$_POST['branch']);
$cgpa=$_POST['cgpa'];
$phone=mysqli_real_escape_string($conn,$_POST['phone']);
$city=mysqli_real_escape_string($conn,$_POST['city']);
$course=mysqli_real_escape_string($conn,$_POST['course']);
$address=mysqli_real_escape_string($conn,$_POST['address']);

/* Photo Upload */

$photo=$_FILES['photo']['name'];
$tmp=$_FILES['photo']['tmp_name'];

move_uploaded_file($tmp,"uploads/".$photo);

/* Challenge : Duplicate Email */

$check=mysqli_query($conn,"SELECT * FROM students WHERE email='$email'");

if(mysqli_num_rows($check)>0){

?>

<!DOCTYPE html>

<html>

<head>

<title>Registration</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container mt-5">

<div class="alert alert-warning">

Email already exists.

</div>

<a href="register.php" class="btn btn-primary">

Back

</a>

</div>

</body>

</html>

<?php

exit();

}

/* Insert Record */

$sql="INSERT INTO students
(name,email,branch,cgpa,photo,address,course,phone,city)

VALUES

('$name','$email','$branch','$cgpa','$photo','$address','$course','$phone','$city')";

if(mysqli_query($conn,$sql)){

$count=mysqli_query($conn,"SELECT * FROM students");

$total=mysqli_num_rows($count);

?>

<!DOCTYPE html>

<html>

<head>

<title>Success</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container mt-5">

<div class="alert alert-success">

Student Registered Successfully!

</div>

<div class="alert alert-info">

You are student #<?php echo $total; ?> in our system!

</div>

<a href="register.php" class="btn btn-primary">

Register Another

</a>

<a href="students.php" class="btn btn-success">

View Students

</a>

</div>

</body>

</html>

<?php

}

else{

echo "Error : ".mysqli_error($conn);

}

}

?>