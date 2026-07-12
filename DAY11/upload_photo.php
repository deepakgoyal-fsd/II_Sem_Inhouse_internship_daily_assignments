<?php
include("db_connect.php");

if(isset($_FILES['photo']))
{
    $photo = $_FILES['photo']['name'];
    $temp = $_FILES['photo']['tmp_name'];

    if(!is_dir("uploads"))
    {
        mkdir("uploads");
    }

    move_uploaded_file($temp, "uploads/".$photo);

    $sql = "UPDATE users SET photo='$photo' LIMIT 1";

    if(mysqli_query($conn,$sql))
    {
        header("Location: profile.php");
        exit();
    }
    else
    {
        echo "Database Error : ".mysqli_error($conn);
    }
}
?>