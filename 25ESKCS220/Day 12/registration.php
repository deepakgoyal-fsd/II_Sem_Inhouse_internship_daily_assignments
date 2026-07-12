<?php
include("db_connect.php");

if(isset($_POST['register']))
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $photo = "";

    if(!empty($_FILES['photo']['name']))
    {
        $photo = $_FILES['photo']['name'];
        move_uploaded_file($_FILES['photo']['tmp_name'], "uploads/".$photo);
    }

    $sql = "INSERT INTO users(name,email,password,photo)
            VALUES('$name','$email','$password','$photo')";

    if(mysqli_query($conn,$sql))
    {
        echo "<script>alert('Registration Successful');</script>";
    }
    else
    {
        echo "<script>alert('Registration Failed');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">

<div class="row justify-content-center">

<div class="col-md-6">

<div class="card shadow">

<div class="card-header text-center">
<h3>Student Registration</h3>
</div>

<div class="card-body">

<form action="" method="POST" enctype="multipart/form-data">

<div class="mb-3">
<label>Name</label>
<input type="text" name="name" class="form-control" required>
</div>

<div class="mb-3">
<label>Email</label>
<input type="email" name="email" class="form-control" required>
</div>

<div class="mb-3">
<label>Password</label>
<input type="password" name="password" class="form-control" required>
</div>

<div class="mb-3">
<label>Photo (Optional)</label>
<input type="file" name="photo" class="form-control">
</div>

<button type="submit" name="register" class="btn btn-primary w-100">
Register
</button>

</form>

</div>

</div>

</div>

</div>

</div>

</body>
</html>