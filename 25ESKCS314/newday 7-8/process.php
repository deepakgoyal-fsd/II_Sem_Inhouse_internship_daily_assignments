<?php

$conn = mysqli_connect("localhost", "root", "", "student_db");

if (!$conn)
{
    die("Connection Failed");
}

$name = $_POST['name'];
$college = $_POST['college'];
$branch = $_POST['branch'];

$sql = "INSERT INTO students(name, college, branch)
VALUES('$name', '$college', '$branch')";

if (mysqli_query($conn, $sql))
{
    echo "Data inserted successfully!";
}
else
{
    echo "Error: " . mysqli_error($conn);
}

mysqli_close($conn);
?>