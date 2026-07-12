<?php 
$name = $_POST["txtName"];
$email = $_POST["txtEmail"];
$number = $_POST["numPhone"];
$gender = $_POST["gender"];
$password = $_POST["pwdPassword"];
$confPassword = $_POST["pwdConformPassword"];
$branch = $_POST["branch"];

//input check

$error = [];
if (empty($name)) {
    $error[] = "Name is empty";
}
if (empty($gender)) {
    $error[] = "Select one gender";
}

if (empty($branch) || $branch === "select") {
    $error[] = "Select one branch";
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $error[] = "email is invalid";
}

if (strlen($number) != 10) {
    $error[] = "Phone number should be 10 digits";
}

if (!is_numeric($number)) {
    $error[] = "Phone Number should be in Digits";
}
if (empty($password)) {
    $error[] = "Password section is empty";
}

if ($password !== $confPassword) {
    $error[] = "confirm password should be same with password box";
}

if (count($error) != 0) {
    foreach ($error as $error)
    {
        echo "$error.<br>";
    }
}
else {

    include("db_connect.php");

    $name = mysqli_real_escape_string($conn, $_POST["txtName"]);
    $branch = mysqli_real_escape_string($conn, $_POST["branch"]);
    $cgpa = mysqli_real_escape_string($conn, $_POST["cgpa"]);
    $number = mysqli_real_escape_string($conn, $_POST["numPhone"]);

    $sql = "INSERT INTO `student_details`
            (name, branch, CGPA, Phone_Number)
            VALUES
            ('$name', '$branch', '$cgpa', '$number')";

    if (mysqli_query($conn, $sql)) {
        echo "Student Registered Successfully!";
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}

?>

