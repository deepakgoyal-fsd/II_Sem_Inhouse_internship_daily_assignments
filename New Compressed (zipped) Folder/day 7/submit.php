<?php
$student_name = $_POST['name'];
$student_branch = $_POST['branch'];

echo "<h1>Data Intercepted Successfully!</h1>";
echo "<p>Your local Apache server has read the form transmission parameters.</p>";
echo "<hr>";
echo "<p><strong>Name Received:</strong> " . $student_name . "</p>";
echo "<p><strong>Branch Received:</strong> " . $student_branch . "</p>";
?>