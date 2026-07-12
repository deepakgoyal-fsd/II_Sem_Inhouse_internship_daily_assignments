<?php
include("db_connect.php");

if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $id = $_POST["id"];
    $name = mysqli_real_escape_string($conn,$_POST["name"]);
    $email = mysqli_real_escape_string($conn,$_POST["email"]);

    $updateQuery = "UPDATE user SET
                    name='$name',
                    email='$email'
                    WHERE id='$id'";

    $result = mysqli_query($conn,$updateQuery);

    if($result)
    {
        header("Location: dashboard.php");
        exit();
    }
    else
    {
        echo "Update Failed";
        echo mysqli_error($conn);
    }
}
?>