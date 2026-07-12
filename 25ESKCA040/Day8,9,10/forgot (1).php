<?php
include("db_connect.php");

$message = "";

if(isset($_POST['update'])){

    $email = $_POST['email'];
    $newpassword = $_POST['newpassword'];
    $confirmpassword = $_POST['confirmpassword'];

    if($newpassword != $confirmpassword){

        $message = "Passwords do not match.";

    }else{

        $sql = "UPDATE data SET password='$newpassword' WHERE email='$email'";

        $result = mysqli_query($conn,$sql);

        if(mysqli_affected_rows($conn)>0){

            $message = "Password Updated Successfully.";

        }else{

            $message = "Email not found.";

        }

    }

}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Forgot Password</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5" style="max-width:450px;">

<h2 class="text-center mb-4">Forgot Password</h2>

<?php
if($message!=""){
    echo "<div class='alert alert-info'>$message</div>";
}
?>

<form method="POST">

    <input type="email" name="email" class="form-control mb-3"
           placeholder="Enter Email" required>

    <input type="password" name="newpassword" class="form-control mb-3"
           placeholder="New Password" required>

    <input type="password" name="confirmpassword" class="form-control mb-3"
           placeholder="Confirm Password" required>

    <button type="submit" name="update"
            class="btn btn-primary w-100">
        Update Password
    </button>

    <a href="login.php" class="btn btn-secondary w-100 mt-3">
        Back to Login
    </a>

</form>

</div>

</body>
</html>