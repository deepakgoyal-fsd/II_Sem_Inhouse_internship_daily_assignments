<?php

session_start();
include "db.php";

if(isset($_POST["login"])){

    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);

    if($email=="ABC@gmail.com" && $password=="123456"){

        $_SESSION["name"]="ABC";
        $_SESSION["email"]="ABC@gmail.com";

        header("Location: dashboard.php");
        exit();

    }else{

        $error="Invalid Email or Password";

    }

}

?>