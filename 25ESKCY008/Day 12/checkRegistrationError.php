<?php
$error = "";

$name = "";
$email ="";
$password ="";
$confirmPassword ="";
$role = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = mysqli_real_escape_string($conn, $_POST["name"]);
    $email = mysqli_real_escape_string($conn,$_POST["email"]);
    $password = mysqli_real_escape_string($conn,$_POST["password"]);
    $confirmPassword = mysqli_real_escape_string($conn, $_POST["confirmPassword"]);
    $role = mysqli_real_escape_string($conn, $_POST["role"]);

    if($name == "" || $email == "" || $password == "" || $confirmPassword == "" || $role == ""){
        $error = "All fields are required.";
        echo $error;
    }elseif($password != $confirmPassword){
        $error = "Password does not match.";
        echo $error;
    } else {
        //insert
        $password = password_hash($password, PASSWORD_DEFAULT);
        $insertQuery = "INSERT INTO user(name, email, password, role) VALUES('$name','$email','$password','$role')";

        $result= mysqli_query($conn, $insertQuery);

        if($result){
            header("Location: success.php");
            exit();
        }else{
            echo "Error occurred while storing data";
            echo "Error: " . mysqli_error($conn);
        }
       
    }
}
?>