<?php
$error="";
$name="";
$email="";
$password="";
$confirmpassword="";

include("dbconnect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name =  mysqli_real_escape_string($conn,$_POST["name"]);
    $email = mysqli_real_escape_string( $conn,$_POST["email"]);
    $password =mysqli_real_escape_string ($conn,$_POST["password"]);
    $confirmpassword = mysqli_real_escape_string($conn,$_POST["confirmpassword"]);

    if (empty($name) || empty($email) || empty($password) || empty($confirmpassword)) {
        die("All fields are required.");
    }

    if ($password != $confirmpassword) {
        die("passwords do not match.");
    }

    $sql = "INSERT INTO user (name, email, password)
            VALUES ('$name', '$email', '$password')";

$result=mysqli_query($conn,$insertQuery);




    if ($result) {
        header("Location: success.php");
        exit();
    } else { 

    echo "error occurred while storing data";
        echo "Error: " . mysqli_error($conn);
    }
}
?>
