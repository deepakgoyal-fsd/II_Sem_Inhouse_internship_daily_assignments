<?php
include("db_connect.php");

$message = "";

if(isset($_POST['register'])){

    $name = mysqli_real_escape_string($conn,$_POST['name']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $password = mysqli_real_escape_string($conn,$_POST['password']);

    // Check if email already exists
    $check = mysqli_query($conn,"SELECT * FROM users WHERE email='$email'");

    if(mysqli_num_rows($check)>0){
        $message = "<div class='alert alert-danger'>Email already exists!</div>";
    }
    else{

        // Password encryption
        $password = password_hash($password,PASSWORD_DEFAULT);

        // Image Upload
        $image = $_FILES['image']['name'];
        $temp = $_FILES['image']['tmp_name'];

        if(!is_dir("uploads")){
            mkdir("uploads");
        }

        move_uploaded_file($temp,"uploads/".$image);

        $insert = "INSERT INTO users(name,email,password,image)
                   VALUES('$name','$email','$password','$image')";

        if(mysqli_query($conn,$insert)){
            $message = "<div class='alert alert-success'>Registration Successful</div>";
        }else{
            $message = "<div class='alert alert-danger'>Registration Failed</div>";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>

<title>Register</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

<div class="card shadow mx-auto" style="max-width:500px;">

<div class="card-body">

<h2 class="text-center mb-4">Student Registration</h2>

<?php echo $message; ?>

<form method="POST" enctype="multipart/form-data">

<label class="form-label">Name</label>
<input type="text" name="name" class="form-control mb-3" required>

<label class="form-label">Email</label>
<input type="email" name="email" class="form-control mb-3" required>

<label class="form-label">Password</label>
<input type="password" name="password" class="form-control mb-3" required>

<label class="form-label">Profile Image</label>
<input type="file" name="image" class="form-control mb-3" accept="image/*" required>

<input type="submit" name="register" value="Register" class="btn btn-primary w-100">

</form>

<br>

<a href="login.php">Already have an account? Login</a>

</div>

</div>

</div>

</body>
</html>
