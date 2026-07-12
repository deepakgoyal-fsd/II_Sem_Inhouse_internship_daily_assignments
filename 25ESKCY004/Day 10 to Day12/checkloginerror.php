<?php
//Check for Log In errors
$error="";

$email="";
$password="";    

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = mysqli_real_escape_string($conn, $_POST['email'] );
    $password = mysqli_real_escape_string($conn, $_POST['password'] );


    if ( empty($email) || empty($password) ) {
        $error = 'Please fill in all fields.';
    } else {
        $select_query = "Select * FROM users WHERE email = '$email' and password = '$password'";

        $result = mysqli_query($conn, $select_query);
        $user = mysqli_fetch_assoc($result);

        if ($user) {
            //After successful login:
            session_start();
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['name'];
            $_SESSION['user_email'] = $user['email'];


            header("Location: dashboard.php");
            exit();
        } else {
            echo "Invalid Credentials";
            echo "Error: " . mysqli_error($conn);
        }
    }    

}
?>