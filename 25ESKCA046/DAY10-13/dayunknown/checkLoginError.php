<?php 
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$error = ""; 
$email = ""; 
$password = ""; 

include("db_connect.php"); 

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $raw_email = $_POST["email"] ?? "";
    $password = $_POST["password"] ?? "";
    
    $email = mysqli_real_escape_string($conn, $raw_email);
         
    if (empty($email) || empty($password)) {
        $error = "All fields are required.";
    } else {
        $selectQuery = "SELECT * FROM user WHERE email='$email'";
        $result = mysqli_query($conn, $selectQuery);
        
        if ($result && mysqli_num_rows($result) > 0) {
            $user = mysqli_fetch_assoc($result);
            
            if(password_verify($password, $user['password'])){
                             
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_name'] = $user['name'];
                $_SESSION['user_email'] = $user['email'];
                $_SESSION['user_role'] = $user['role'];
                 
                    header("Location: dashboard.php");
                    exit();
                         
            } else {
                $error = "Invalid Email or Password";
            }
        } else {
            $error = "Invalid Email or Password";
        }
    }
}
?>