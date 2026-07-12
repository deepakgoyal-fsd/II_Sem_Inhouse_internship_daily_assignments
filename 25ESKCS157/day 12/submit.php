<?php
include 'db.php';
session_start();

if (!isset($_SESSION['admin_logged_in'])) {
    die("Authentication Error");
}

$student_name = $_POST['name'];
$student_branch = $_POST['branch'];

if ($student_name != "" && $student_branch != "") {
    $sql = "INSERT INTO students (name, branch) VALUES ('$student_name', '$student_branch')";
    
    if (mysqli_query($conn, $sql)) {
        echo "<div style='font-family: Arial, sans-serif; max-width: 500px; margin: 50px auto; padding: 30px; border: 1px solid #e0e0e0; border-radius: 8px; text-align: center; box-shadow: 0 4px 6px rgba(0,0,0,0.1);'>";
        echo "<h2 style='color: #198754; font-weight: bold;'>Record Saved Securely!</h2>";
        echo "<p style='color: #6c757d; margin-bottom: 25px;'>The entry has been pushed live into the MySQL database tables.</p>";
        echo "<a href='register.php' style='display: inline-block; padding: 10px 20px; background-color: #0d6efd; color: white; text-decoration: none; font-weight: bold; border-radius: 4px; margin-right: 10px;'>Add Another</a>";
        echo "<a href='dashboard.php' style='display: inline-block; padding: 10px 20px; background-color: #6c757d; color: white; text-decoration: none; font-weight: bold; border-radius: 4px;'>Back Home</a>";
        echo "</div>";
    } else {
        echo "Database Write Failure: " . mysqli_error($conn);
    }
}
?>