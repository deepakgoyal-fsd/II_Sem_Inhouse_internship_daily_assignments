<?php
include "../common/db_connect.php";

$id = $_GET['id'];

$sql = "DELETE from students where id = $id";
$res = mysqli_query($cionn, $sql);

if ($res){
    $_SESSION['message'] = 'student record '
}
?>