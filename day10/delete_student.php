<?php
include("db.php");

// Check if ID is provided
if (!isset($_GET['roll_no'])) {
    header("Location: students.php");
    exit();
}

$roll_no = (int)$_GET['roll_no'];

// Check if student exists
$stmt = $conn->prepare("SELECT * FROM students WHERE roll_no = ?");
$stmt->bind_param("i", $roll_no);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
    header("Location: students.php");
    exit();
}

$stmt->close();

// Delete student
$delete = $conn->prepare("DELETE FROM students WHERE roll_no = ?");
$delete->bind_param("i", $roll_no);

if ($delete->execute()) {
    header("Location: students.php?msg=deleted");
    exit();
} else {
    echo "<h3>Error deleting student!</h3>";
}

$delete->close();
$conn->close();
?>