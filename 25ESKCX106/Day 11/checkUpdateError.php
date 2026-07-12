<?php
$error = "";

$email ="";
$password ="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $oldPassword = mysqli_real_escape_string($conn,$_POST["oldPassword"]);
    $newPassword = mysqli_real_escape_string($conn,$_POST["newPassword"]);
    $confirmPassword = mysqli_real_escape_string($conn,$_POST["confirmPassword"]);
    
    if ($email == "" || $password == ""||$confirmPassword=="") {
        $error = "All fields are required.";
        echo $error;
    } else {
        //insert
        $selectQuery = "Select * from user where password='$oldPassword' and password = '$newPassword' and password='confirmPassword'";

        $result= mysqli_query($conn, $selectQuery);
        $user = mysqli_fetch_assoc($result);

        if($user && $user["password"]==$oldPassword){

        $updateQuery "update user set password='$newPassword' where id=$_SESSION['user_id']";


$result= mysqli_query($conn, $updateQuery);


header("Location: updateSuccess.php");
            
            header("Location: dashboard.php");
            exit();
        }else{
            echo "Invalid Credentials";
            echo "Error: " . mysqli_error($conn);
        }
       
    }
}
?>