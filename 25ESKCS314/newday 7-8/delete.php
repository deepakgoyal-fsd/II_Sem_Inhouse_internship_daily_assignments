<!DOCTYPE html>
<html>
<head>
    <title>Delete Student</title>
</head>
<body>

<h2>Delete Student</h2>

<form method="post">

    <input type="number" name="id" placeholder="Enter Student ID" required>

    <input type="submit" name="delete" value="Delete Student">

</form>

<?php

$conn = mysqli_connect("localhost", "root", "", "student_db");

if (!$conn)
{
    die("Connection Failed");
}

if(isset($_POST['delete']))
{
    $id = $_POST['id'];

    $sql = "DELETE FROM students WHERE id='$id'";

    if(mysqli_query($conn, $sql))
    {
        if(mysqli_affected_rows($conn) > 0)
        {
            echo "<h3>Student Deleted Successfully!</h3>";
        }
        else
        {
            echo "<h3>No Student Found!</h3>";
        }
    }
    else
    {
        echo mysqli_error($conn);
    }
}

mysqli_close($conn);

?>

</body>
</html>