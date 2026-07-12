<?php session_start();
 include '../common/db_connect.php';

$email = $_POST['email'];
$password = $_POST['password'];

$query = "select * from admins where email = '$email'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

if ($row && password_verify($password, $row['password'])) {
    $_SESSION['admin'] = $row;
    $_SESSION['is_loggedin'] = true;
    header('location:dashboard.php');
    exit;
}else{    
    header('location:index.php');
    exit;
}
