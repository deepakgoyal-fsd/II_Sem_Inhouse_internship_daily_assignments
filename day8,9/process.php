<?php
include('db-connect.php');

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $roll_no = mysqli_real_escape_string($conn, $_POST['roll_no']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $branch = mysqli_real_escape_string($conn, $_POST['branch']);
    $cgpa = $_POST['cgpa'];
    $phone_no = mysqli_real_escape_string($conn, $_POST['phone_no']);

    $sql= "INSERT INTO student(name, roll_no, email, branch, cgpa, phone_no) VALUES('$name','$roll_no','$email','$branch','$cgpa','$phone_no')";

    if(mysqli_query($conn, $sql)){
        echo "Student Registered Successfully!";
    } else{
        echo "Error: ". mysqli_error($conn);
    }
}
?>