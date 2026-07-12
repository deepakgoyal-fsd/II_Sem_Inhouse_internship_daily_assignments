<?php

include "db_connect.php";

if(isset($_POST['submit']))
{

    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $branch = $_POST['branch'];
     $age = $_POST['age'];
    $password = $_POST['password'];
    $confirm_password= $_POST['confirm_password'];
    

if ($password != $confirm_password) {
    echo "<script>
        alert('Password and Confirm Password do not match!');
        window.history.back();
    </script>";
    exit();
}

    // Photo Upload

    $photo = $_FILES['photo']['name'];
    $temp = $_FILES['photo']['tmp_name'];

    move_uploaded_file($temp,"uploads/".$photo);
    $sql="INSERT INTO user(full_name,email,mobile,gender,dob,age,branch,photo,password)

     VALUES('$full_name','$email','$mobile','$gender','$dob','$age','$branch','$photo','$password')";
    

    if(mysqli_query($conn,$sql))
    {
        echo "<script>

        alert('Registration Successful');

        window.location='login.php';

        </script>";
    }
    else
    {
        echo "Error : ".mysqli_error($conn);
    }

}

?>