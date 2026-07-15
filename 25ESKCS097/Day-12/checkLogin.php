<?php 

include ('db_connect.php');
$error = "";

$email="";
$password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    if (empty($email) || empty($password)) {
        $error = "Please enter both email and password.";
        echo $error;
    } else {
        $selectQuery = "SELECT * FROM user WHERE email = '$email' AND password = '$password'";
        $result = mysqli_query($conn, $selectQuery);
        $user = mysqli_fetch_assoc($result);

        if($user)
            {
                session_start();

                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_name'] = $user['username'];
                $_SESSION['user_email'] = $user['email'];

                if($user['role'] == 'admin') {
                    header("Location: adminDashboard.php");
                } else {
                    header("Location: dashboard.php");
                }
                
                
                exit();
            }
        else{
            echo "Invalid email or password.";
            echo "Error: " . mysqli_error($conn);
        }    
    }
}



?>