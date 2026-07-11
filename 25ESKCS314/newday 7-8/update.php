
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Student</title>
</head>
<body>

<h2>Update Student Details</h2>

<form method="post">

    <input type="number" name="id" placeholder="Enter Student ID" required><br><br>

    <input type="text" name="name" placeholder="Enter New Name" required><br><br>

    <input type="text" name="college" placeholder="Enter New College" required><br><br>

    <input type="text" name="branch" placeholder="Enter New Branch" required><br><br>

    <input type="submit" name="update" value="Update Student">

</form>

<?php

$conn = mysqli_connect("localhost", "root", "", "student_db");

if (!$conn)
{
    die("Connection Failed: " . mysqli_connect_error());
}

if(isset($_POST['update']))
{
    $id = $_POST['id'];
    $name = $_POST['name'];
    $college = $_POST['college'];
    $branch = $_POST['branch'];

    $sql = "UPDATE students
            SET name='$name',
                college='$college',
                branch='$branch'
            WHERE id='$id'";

    if(mysqli_query($conn, $sql))
    {
        if(mysqli_affected_rows($conn) > 0)
        {
            echo "<h3>Student Updated Successfully!</h3>";
        }
        else
        {
            echo "<h3>No student found with that ID.</h3>";
        }
    }
    else
    {
        echo "Error: " . mysqli_error($conn);
    }
}

mysqli_close($conn);

?>

</body>
</html>