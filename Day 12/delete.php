<?php include 'auth.php'; ?>
<?php
session_start();
include 'db_connect.php';

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];
    
    $studentQuery = mysqli_query($conn, "SELECT name FROM students WHERE id = $id");
    if ($row = mysqli_fetch_assoc($studentQuery)) {
        $name = $row['name'];
        $sql = "DELETE FROM students WHERE id = $id";
        if (mysqli_query($conn, $sql)) {
            $_SESSION['error'] = "Record deleted successfully for " . htmlspecialchars($name) . ".";
        } else {
            $_SESSION['error'] = "Error deleting record: " . mysqli_error($conn);
        }
    }
}
header("Location: index.php");
exit();
?>