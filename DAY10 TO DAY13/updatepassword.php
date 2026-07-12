<?php
session_start();
include("db.php");

if(!isset($_SESSION['id']))
{
    header("Location: login.php");
    exit();
}

if(isset($_POST['update']))
{
    $oldpassword = trim($_POST['oldpassword']);
    $newpassword = trim($_POST['newpassword']);
    $confirmpassword = trim($_POST['confirmpassword']);

    if($oldpassword=="" || $newpassword=="" || $confirmpassword=="")
    {
        echo "<script>
        alert('All fields are required!');
        </script>";
    }
    else
    {
        $id=$_SESSION['id'];

        $check="SELECT * FROM user WHERE id='$id' AND password='$oldpassword'";
        $result=mysqli_query($conn,$check);

        if(mysqli_num_rows($result)==1)
        {
            if($newpassword==$confirmpassword)
            {
                $update="UPDATE user SET password='$newpassword' WHERE id='$id'";

                if(mysqli_query($conn,$update))
                {
                   header("Location : dashboard.php");
                   exit();
                }
                else
                {
                    echo "<script>
                    alert('Update Failed!');
                    </script>";
                }
            } 
            else
            {
                echo "<script>
                alert('New Password and Confirm Password do not match!');
                </script>";
            }
        }
        else
        {
            echo "<script> 
            alert('Old Password is Incorrect!');
            </script>";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Update Password</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

<div class="row justify-content-center">

<div class="col-md-5">

<div class="card shadow">

<div class="card-header bg-warning text-center">

<h3>Update Password</h3>

</div>

<div class="card-body">

<form method="POST">

<div class="mb-3">

<label>Old Password</label>

<input type="password"
name="oldpassword"
class="form-control"
required>

</div>

<div class="mb-3">

<label>New Password</label>

<input type="password"
name="newpassword"
class="form-control"
required>

</div>

<div class="mb-3">

<label>Confirm Password</label>

<input type="password"
name="confirmpassword"
class="form-control"
required>

</div>

<button
type="submit"
name="update"
class="btn btn-warning w-100">

Update Password

</button>

<br><br>

<a href="dashboard.php"
class="btn btn-secondary w-100">

Back to Dashboard

</a>

</form>

</div>

</div>

</div>

</div>

</div>

</body>
</html>