<?php
// include ("header.php");
// include ("CheckRegistrion.php");
?>
<?php
//<div class ="container mt-5" style ="max-width:400px;">
include 'db_connect.php';

$error = "";
$email = "";
$password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);

    if ($email == "" || $password == "") {
        $error = "All fields are required.";
        echo $error;
    } 
    /* elseif ($password!=$confirmpassword){
       $error ="password does not match";
       } */
    else {
        $selectQuery = "SELECT * FROM intern_yash WHERE email='$email' AND password='$password'";
        $result = mysqli_query($conn, $selectQuery);

        if ($result && mysqli_num_rows($result) > 0) {
            $user = mysqli_fetch_assoc($result);
            session_start();
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['username'] = $user['name'];

            header("Location: dashboard.php");
            exit();
        } else {
            echo "Invalid Credentials";
        }
    }
}
?>