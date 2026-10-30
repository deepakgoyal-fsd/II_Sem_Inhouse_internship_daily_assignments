<?php
include 'db_connect.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($conn, $_POST["name"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $branch = mysqli_real_escape_string($conn, $_POST["branch"]);
    $cgpa = $_POST["cgpa"];
    $check = mysqli_query($conn, "SELECT id FROM students WHERE email='$email'");
    if (mysqli_num_rows($check) > 0) {
        die("Email already exists. <a href='index.php'>Back</a>");
    }
    $sql = "INSERT INTO students(name,email,branch,cgpa) VALUES('$name','$email','$branch','$cgpa')";
    echo mysqli_query($conn, $sql) ? "Registered Successfully.<br><a href='students.php'>View Students</a>" : "Error: " . mysqli_error($conn);
}
?>