<?php
$studentList = mysqli_query($conn, "SELECT * FROM students ORDER BY name ASC");

$total = mysqli_num_rows($studentList);
echo "Found $total student(s):<br>";

while ($record = mysqli_fetch_assoc($studentList)) {
    echo "- " . $record['name'] . "<br>";
}
?>
