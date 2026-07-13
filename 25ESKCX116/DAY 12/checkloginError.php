<?php
$error = "";
$email = "";
$password = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);


    if($email == "" || $password == ""){

        $error = "All fields are required";
        echo $error;

    } else {

        // Find user by email only
        $selectquery = "SELECT * FROM user WHERE email='$email'";

        $result = mysqli_query($conn, $selectquery);

        $user = mysqli_fetch_assoc($result);


        if($user){

            if(password_verify($password, $user['password'])){

                session_start();

                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_name'] = $user['name'];
                $_SESSION['user_email'] = $user['email'];
                if($user['role']=='admin'){
                    header("Location: admin/admindashboard.php");
                }else{
                header("Location: dashboard.php");
                exit();
                }
            } else {

                echo "Invalid Credentials";

            }

        } else {

            echo "Invalid Credentials";

        }

    }

}

?>
