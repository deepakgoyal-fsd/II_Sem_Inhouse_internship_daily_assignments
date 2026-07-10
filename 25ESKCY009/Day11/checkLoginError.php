<?php

// Check for login errors
$error="";

$email= "";
$password= "";

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    
    
    if ( empty($email) || empty($password)) {
        $error = "All fields are required.";
        } else {
            $selectQuery = "Select * from `user` where email='$email' and password='$password'"; 
            
            $result=mysqli_query($conn,$selectQuery);
            $user=mysqli_fetch_assoc($result);
            
            if ($user) {
                
            session_start();
            $_SESSION['user_id']=$user['id'];
            $_SESSION['user_name']=$user['name'];
            $_SESSION['user_email']=$user['email'];

            if($user['role']=='admin'){
                header("Location: admin/adminDashboard.php");
            } else {
                header("Location: dashboard.php");
            }
            exit();
        } else {
            $error = "Invalid Credentials";
        }
    }
}
?>