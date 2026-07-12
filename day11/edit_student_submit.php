<?php 
include "../common/db_connect.php";
session_start();
if(isset($_SESSION['is_loggedin']) || $_SESSION['is_loggedin'] !==true){
    header('location:index.php'); exit;
}
?>

$name = $_POST['name'];
$email = $_POST['email'];
$college = $_POST['college'];
$branch = $_POST['branch'];
$id  = $_POST['id'];

$sql = "Update students set 
name = '$name',
email = '$email',
college = '$college',
branch = '$branch'

where id = $id
";

$res = mysqli_query($conn, $sql);
if ($res) {
    header('Location: students.php');
}
