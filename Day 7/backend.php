<!DOCTYPE html>
<html>
<head>
    <title>Registration Result</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">

<?php

include("db.php");

$name = $_POST['name'];
$email = $_POST['email'];
$branch = $_POST['branch'];
$phone = $_POST['phone'];
$gender = $_POST['gender'];
$course = $_POST['course'];
$address = $_POST['address'];

$photo = $_FILES['photo']['name'];
$temp = $_FILES['photo']['tmp_name'];

move_uploaded_file($temp,"uploads/".$photo);

$errors = [];

if(empty($name))
{
    $errors[] = "Name is required";
}

if(!filter_var($email, FILTER_VALIDATE_EMAIL))
{
    $errors[] = "Enter a valid email";
}

if(strlen($phone) != 10)
{
    $errors[] = "Phone number must be 10 digits";
}

if(empty($gender))
{
    $errors[] = "Select gender";
}

if(strlen($address) < 10)
{
    $errors[] = "Address should be at least 10 characters";
}

if(count($errors) > 0)
{
    echo "<div class='alert alert-danger'>";
    echo "<h4>Errors</h4>";
    echo "<ul>";

    foreach($errors as $error)
    {
        echo "<li>$error</li>";
    }

    echo "</ul>";
    echo "<a href='register.php' class='btn btn-danger'>Go Back</a>";
    echo "</div>";
}
else
{

$sql = "INSERT INTO students
(name,email,branch,phone,photo,gender,course,address)
VALUES
('$name','$email','$branch','$phone','$photo','$gender','$course','$address')";
mysqli_query($conn,$sql);
?>
?>

<div class="card p-4 shadow">
<h2 class="text-success">Registration Successful</h2>
<p><b>Name:</b> <?php echo $name; ?></p>
<p><b>Email:</b> <?php echo $email; ?></p>
<p><b>Branch:</b> <?php echo $branch; ?></p>
<p><b>Phone:</b> <?php echo $phone; ?></p>
<p><b>Gender:</b> <?php echo $gender; ?></p>
<p><b>Course:</b> <?php echo $course; ?></p>
<p><b>Address:</b> <?php echo $address; ?></p>
<a href="register.php" class="btn btn-primary">
Register Again
</a>

</div>

<?php
}
?>

</div>
</body>
</html>