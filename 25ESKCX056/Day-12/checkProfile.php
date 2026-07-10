<?php 

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

include ('db_connect.php');
$error = "";

$name = "";
$email = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];

    if (empty($name) || empty($email)) {
        $error = "Please fill in all fields.";
        echo $error;
    } else {
        if (empty($_SESSION['user_id'])) {
            echo "User session not found.";
        } else {
            $user_id = intval($_SESSION['user_id']);
            $name_safe = mysqli_real_escape_string($conn, $name);
            $email_safe = mysqli_real_escape_string($conn, $email);
            $updateQuery = "UPDATE user SET username = '$name_safe', email = '$email_safe' WHERE id = $user_id";

            mysqli_query($conn, $updateQuery);
            $_SESSION['user_name'] = $name_safe;
            $_SESSION['user_email'] = $email_safe;
            header("Location: dashboard.php");
            exit();
        }
    }
}
            
           

            
?>
     

