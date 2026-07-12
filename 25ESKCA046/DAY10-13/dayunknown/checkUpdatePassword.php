<?php 
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include("db_connect.php"); 

$error = ""; 
$message = ""; 

if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    // Validate session exists before querying the database
    if (!isset($_SESSION['user_id'])) {
        $error = "Your session has expired. Please log in again.";
    } else {
        $raw_old = $_POST["oldpassword"] ?? "";
        $raw_new = $_POST["newpassword"] ?? "";
        $raw_confirm = $_POST["confirmpassword"] ?? "";
             
        if(empty($raw_new) || empty($raw_old) || empty($raw_confirm)){
            $error = "All fields are required.";
        } elseif($raw_new !== $raw_confirm){
            $error = "New passwords do not match.";
        } else {
            $userId = mysqli_real_escape_string($conn, $_SESSION['user_id']); 
            
            $selectQuery = "SELECT * FROM user WHERE id='$userId'";
            $result = mysqli_query($conn, $selectQuery);
            
            // Check if the user ID generated a valid result
            if ($result && mysqli_num_rows($result) > 0) {
                $user = mysqli_fetch_assoc($result);
                         
                if(password_verify($raw_old, $user["password"])){
                    $hashedNewPassword = password_hash($raw_new, PASSWORD_DEFAULT);
                                 
                    $updateQuery = "UPDATE user SET password='$hashedNewPassword' WHERE id='$userId'";
                    
                    if(mysqli_query($conn, $updateQuery)){
                        $message = "Password updated successfully!";
                    } else {
                        $error = "Database error: Failed to update password.";
                    }
                } else {
                    $error = "Old password is incorrect.";
                }
            } else {
                $error = "User account not found.";
            }
        }
    }
}
?>