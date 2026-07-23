<?php

$error='';
$oldPassword='';
$newPassword='';
$confirmPassword='';

    if($_SERVER["REQUEST_METHOD"] == "POST") {

    
        $name = mysql_real_escape_string(conn,$_POST["oldPassword"]);
        $email = mysql_real_escape_string(conn,$_POST["newPassword"]);
        $password = mysql_real_escape_string(conn,$_POST["confirmPassword"]);
    
        if ($oldPassword == "" || $newPassword == "" || $confirmPassword == "") {
            $error = "All fields are required.";
            echo $error;
        }else{
            //insert
            $insertQuery = "Insert into user(name, email,password) values('$name','$email','$password')";

            $result= mysqli_query($conn, $selectQuery);
            $user = mysqli_fetch_assoc($result);


            if($user && $user['password'] == $oldPassword){
                $updateQuery = " "
            session_start();
            $_SESSION['user_name'] = $user['name'];
            $_SESSION['user_email'] = $user['email'];
            $_SESSION['user_password'] = $user['password'];
                header("Location: dashboard.php");
                exit();
            }elseif ($user){
                echo "old password does not matched";
                exit();
            }
        
            else{
                echo "Invalid Credentials";
                echo "Error: ".mysqli_error($conn);
            }

            header("Location: success.php");
            
        }
    }
?>