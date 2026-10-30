<?php
// include("header.php");
?>

<!-- <div class = "container mt-5" style = "max-width:400px;"> -->

<?php
$error = "";
include("database2.php");


$email = "";
$password = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
   $email = mysqli_real_escape_string($conn, $_POST["email"]);
   $password = mysqli_real_escape_string($conn, $_POST["password"]);

//    $sql = "INSERT INTO user (email , password) VALUES ('$email', '$password')";


    if ($email == "" || $password == ""){
        $error = "ALL FIELDS ARE REQUIRED";
        echo $error;
    }
     else {
        $select_query = "SELECT * From user where email = '$email' AND password = '$password'";

        $_result = mysqli_query($conn, $select_query);
        $_user = mysqli_fetch_assoc($_result);
        
        if ($_user) {
            session_start();

            $_SESSION['user_id'] = $_user['id'];
            $_SESSION['user_name'] = $_user['name'];
            $_SESSION['user_email'] = $_user['email'];

            if($_user['role'] == 'admin'){
                header("Location: admin/admindashboard.php");
                exit();
            } else {
                echo "Error occured while storing data";
            }


            header("Location: dashboard.php");
            exit();

        } else {
            echo "Error occurred while storing data";
            // echo "Error: " . mysqli_error($conn);
        }
    } 
}   
?>
