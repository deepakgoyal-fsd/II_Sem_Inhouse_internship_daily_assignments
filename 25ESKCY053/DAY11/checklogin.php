 <?php
 /* include ("header.php");
 include ("CheckRegistration.php"); */
?>

 <?php
 
//  <div class="container mt-5" style="max-width:400px;">
include 'SQLconnect.php';
$error="";
$email="";
$password="";


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    


    if ($email == "" || $password == "") {
        $error = "All fields are required.";
        echo $error;
    } /* elseif($password != $confirmpassword){
        $error = "password does not match";
        echo $error;
    } */
    else {
        $select_query = "SELECT * FROM user WHERE email='$email' AND password='$password'";

        $result = mysqli_query($conn, $select_query);
        $user = mysqli_fetch_assoc($result);

        if ($user) {
            session_start();
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_name'] = $user['name'];
                $_SESSION['user_email']= $user['email'];
                
                if ($user['role']== 'admin') {
                    header("location: admin/adminDash.php");
                    exit();
                } else {
                     header("location: dashboard.php");
                     exit();
                }
                
            /* header("Location: dashboard.php");
            exit();
            header("Location: dashboard.php");
            exit(); */
           
        } else {
            echo "error occured while storing data";
        }
    }
}
?>

<?php
// include("fotter.php");
?>
