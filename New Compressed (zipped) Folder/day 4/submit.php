<?php
// We use $_POST because your HTML form has method="POST"
$student_name = $_POST['name'];

echo "<h1>Registration Received Successfully!</h1>";
echo "<p>Welcome to the backend server page.</p>";
echo "<hr>";
echo "<p><strong>Data Received:</strong> " . $student_name . "</p>";
?>