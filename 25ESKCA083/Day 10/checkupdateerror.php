<?php
session_start(); // 1. CRUCIAL: Must start the session to read $_SESSION['user_id']
include("db_connect.php"); // Ensure your database connection is loaded

$error = "";
$currentpassword = "";
$newpassword = "";
$confirmpassword = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $currentpassword = $_POST['currentpassword'];
    $newpassword = $_POST['newpassword'];
    $confirmpassword = $_POST['confirmpassword'];

    if ($currentpassword == "" || $newpassword == "" || $confirmpassword == "") {
        $error = "All fields are required";
        echo $error;
    } elseif ($newpassword !== $confirmpassword) {
        $error = "New password does not match";
        echo $error;
    } else {
        // Fix syntax error by saving session ID into a clean variable
        $userId = $_SESSION['user_id'];
        
        // Grab the user details
        $selectQuery = "SELECT * FROM info WHERE id = '$userId'";
        $result = mysqli_query($conn, $selectQuery);
        $user = mysqli_fetch_assoc($result);

        // Fix: Use password_verify to check the old password correctly
        if ($user && password_verify($currentpassword, $user["password"])) {
            
            // Securely hash the NEW password before saving it
            $hashed_new_password = password_hash($newpassword, PASSWORD_DEFAULT);
            
            // Fix: Pointing to the correct variable ($hashed_new_password) and user ID
            $updateQuery = "UPDATE info SET password = '$hashed_new_password' WHERE id = '$userId'";

            // Fix: Actually execute the UPDATE query, not the select query!
            if (mysqli_query($conn, $updateQuery)) {
                header("Location: updateSuccess.php");
                exit();
            } else {
                echo "Database Error: " . mysqli_error($conn);
            }
        } else {
            echo "Old password does not match";
            exit();
        }
    }   
}
?>