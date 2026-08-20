<?php
$Error = "";

$email = "";
$password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);

    if ($email == "" || $password == ""){
        
       $Error = "All fields are required.";
        echo $Error;

    } else {

        $SelectQuery = "SELECT * FROM user WHERE email='$email' AND password= '$password'";
        
        $Result = mysqli_query($conn, $SelectQuery);
        $User = mysqli_fetch_assoc($Result);

        if ($User) {

        session_start();

        $_SESSION["user_id"] = $User["id"];
        $_SESSION["user_name"] = $User["name"];
        $_SESSION["user_email"] = $User["email"];

        header("Location: dashboard.php");
        exit();

        }else {
            echo "Invalid Credentials";
        }
    }
    }
    ?>
