
<?php

session_start();

if (!isset($_SESSION['user_id'])) {

    header("Location: login.php");
    exit();

}

?>
<?php

include 'db_connect.php';

if (!isset($_GET['id'])) {

    header("Location: students.php");
    exit();

}

$id = $_GET['id'];

// Get student name before deleting
$getStudent = mysqli_query($conn, "SELECT name FROM students WHERE id='$id'");

if (mysqli_num_rows($getStudent) == 0) {

    header("Location: students.php");
    exit();

}

$student = mysqli_fetch_assoc($getStudent);

$studentName = $student['name'];

// Delete record
$sql = "DELETE FROM students WHERE id='$id'";

if (mysqli_query($conn, $sql)) {

    header("Location: students.php?deleted=" . urlencode($studentName));
    exit();

}

header("Location: students.php");

?>