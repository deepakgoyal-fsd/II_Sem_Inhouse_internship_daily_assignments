<?php include "../common/db_connect.php";


$name = $_POST['name'];
$email = $_POST['email'];
$college = $_POST['college'];
$branch = $_POST['branch'];
$id = intval($_POST['id']);

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
} else {
    header('Location: edit_student.php?id=' . $id);
}
exit;
