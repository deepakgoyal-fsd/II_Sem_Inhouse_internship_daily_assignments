<?php
$error = "";

$email ="";
$password ="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = mysqli_real_escape_string($conn,$_POST["email"]);
    $password = mysqli_real_escape_string($conn,$_POST["password"]);
    
    if ($email == "" || $password == "") {
        $error = "All fields are required.";
        echo $error;
    } else {
        //insert
        $selectQuery = "Select * from user where email='$email' and password = '$password'";

        $result= mysqli_query($conn, $selectQuery);
        $user = mysqli_fetch_assoc($result);


        if($user){
            //After succesfull login
            session_start();
            $_SESSION["user_id"] = $user["id"];
            $_SESSION["user_name"] = $user["name"];
            $_SESSION["user_email"] = $user["email"];
            if($user['role']==0){
                header("location: admin/adminDashboard.php");

            }
            else{
                header("location: dashboard.php");

            }
            header("Location: dashboard.php");
            exit();
        }else{
            echo "Invalid Credentials";
            echo "Error: " . mysqli_error($conn);
        }
       
    }
}
?>