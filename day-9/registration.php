<?php

include("db_connect.php");

$name = $_POST['name'];
$roll_no = $_POST['roll_no'];
$branch = $_POST['branch'];
$cgpa = $_POST['cgpa'];
$phone_number = $_POST['phone_number'];

// Photo Upload
$photo = $_FILES['photo']['name'];
$temp = $_FILES['photo']['tmp_name'];

$folder = "Uploads/" . $photo;

move_uploaded_file($temp, $folder);

// Insert data into database
$sql = "INSERT INTO `user` (name, roll_no, branch, cgpa, phone_number)
VALUES ('$name', '$roll_no', '$branch', '$cgpa', '$phone_number')";

if (mysqli_query($conn, $sql))
{
    echo "<!DOCTYPE html>";
    echo "<html><head><title>Registration Successful</title></head><body>";

    echo "<h2 align='center' style='color:green;'>Registration Successful!</h2>";

    echo "<center>";

    echo "<img src='$folder' width='180' height='180' style='border-radius:10px;'><br><br>";

    echo "<b>Name:</b> $name <br><br>";
    echo "<b>Roll Number:</b> $roll_no <br><br>";
    echo "<b>Branch:</b> $branch <br><br>";
    echo "<b>CGPA:</b> $cgpa <br><br>";
    echo "<b>Phone Number:</b> $phone_number <br><br>";

    echo "</center>";

    echo "</body></html>";
}
else
{
    echo "Error: " . mysqli_error($conn);
}

mysqli_close($conn);

?>