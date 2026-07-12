<?php
include('db_connect.php');

if($_SERVER['REQUEST_METHOD'] =='POST') {
    $name = mysqli_real_escape_string($conn, $_post['name']);
     $email = mysqli_real_escape_string($conn, $_post['email']);
 $branch = mysqli_real_escape_string($conn, $_post['branch']);
 $cgpa = $_post['cgpa'];

 $sql = "INSERRT INTO students (name, email, branch, cgpa)
         VALUES ('$name', '$email', '$branch', '$cgpa')";

         if(mysqli_query($conn,$sql)) {
            echo "Student Registered Successfully";
         } else {
            echo "Error:  " .mysqli_error($conn);
       }
         }
         ?>
