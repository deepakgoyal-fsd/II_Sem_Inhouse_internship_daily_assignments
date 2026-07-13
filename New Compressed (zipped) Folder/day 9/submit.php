<?php
// Include the database connection credentials from our db.php file
include 'db.php';

$student_name = $_POST['name'];
$student_branch = $_POST['branch'];

// Run basic input validation to prevent blank database rows
if ($student_name != "" && $student_branch != "") {
    
    // Construct the standard SQL write statement
    $sql = "INSERT INTO students (name, branch) VALUES ('$student_name', '$student_branch')";
    
    // Execute the query link against the database table
    if (mysqli_query($conn, $sql)) {
        echo "<div style='font-family: Arial, sans-serif; padding: 20px;'>";
        echo "<h2 style='color: green;'>Success!</h2>";
        echo "<p>Student record has been written permanently into your phpMyAdmin table.</p>";
        echo "<a href='index.html'>Register Another Record</a>";
        echo "</div>";
    } else {
        echo "Database Write Failure: " . mysqli_error($conn);
    }
}
?>