<?php

include("db_connect.php");
include("dashboardHeader.php");
include("dashboardVerticalContent.php");

if(isset($_POST['updatePassword']))
{

    $oldpassword=$_POST['oldpassword'];
    $newpassword=$_POST['newpassword'];
    $confirmpassword=$_POST['confirmpassword'];

    $email=$_SESSION['user_email'];

    $check="SELECT * FROM user
            WHERE email='$email'
            AND password='$oldpassword'";

    $result=mysqli_query($conn,$check);

    if(mysqli_num_rows($result)>0)
    {

        if($newpassword==$confirmpassword)
        {

            $update="UPDATE user
                     SET password='$newpassword'
                     WHERE email='$email'";

            if(mysqli_query($conn,$update))
            {
                echo "<script>alert('Password Updated Successfully');</script>";
            }

        }

        else
        {
            echo "<script>alert('Passwords do not match');</script>";
        }

    }

    else
    {
        echo "<script>alert('Current Password Incorrect');</script>";
    }

}
?>

<form method="post">

<div class="container mt-5" style="max-width:400px;">

<h3>Update Password</h3>

<input
type="password"
name="oldpassword"
class="form-control mb-3"
placeholder="Current Password">

<input
type="password"
name="newpassword"
class="form-control mb-3"
placeholder="New Password">

<input
type="password"
name="confirmpassword"
class="form-control mb-3"
placeholder="Confirm Password">

<button
type="submit"
name="updatePassword"
class="btn btn-primary w-100">

Update Password

</button>

</div>

</form>

<?php
include("dashboardFooter.php");
?>