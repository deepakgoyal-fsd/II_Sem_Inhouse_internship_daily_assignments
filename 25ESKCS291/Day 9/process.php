<?php

include 'connection.php';

if(isset($_POST['submit']))
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $college = $_POST['college'];
    $branch = $_POST['branch'];

    $sql = "INSERT INTO students (name, email, college, branch)
            VALUES ('$name', '$email', '$college', '$branch')";

    if(mysqli_query($conn, $sql))
    {
        echo "Student Registered Successfully!";
    }
    else
    {
        echo "Error: " . mysqli_error($conn);
    }
}

?>