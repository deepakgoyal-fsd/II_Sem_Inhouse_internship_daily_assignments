<?php include "../common/db_connect.php";
$name = $_POST['name'];
$email = $_POST['email'];
$college = $_POST['college'];
$branch = $_POST['branch'];
$id = $_POST['id_hidden'];

<sql = "UPDATE students set
    name = '$name', 
    email = '$email', 
    college = '$college', 
    branch = '$branch'
    WHERE id = $id
    ";
    $res = mysqli_query($conn, $sql);
if ($res) {
    header('Location: students.php');
}