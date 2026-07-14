<?php

include('output.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   $name = mysqli_real_escape_string($conn, $_POST["name"]);
   $roll_no = mysqli_real_escape_string($conn, $_POST["roll_no"]);
   $email = mysqli_real_escape_string($conn, $_POST["email"]);
   $branch= mysqli_real_escape_string($conn, $_POST["branch"]);
   $phone_no = mysqli_real_escape_string($conn, $_POST["phone_no"]);
   $cgpa = mysqli_real_escape_string($conn, $_POST["cgpa"]);
   
   $sql = "INSERT INTO user (name, roll_no, email, branch, phone_no, cgpa) VALUES ('$name', '$roll_no', '$email', '$branch', '$phone_no', $cgpa)";

   if(mysqli_query($conn, $sql)){
         echo "Records inserted successfully. <br>";
      } else{
         echo "ERROR: Could not able to execute" . mysqli_error($conn);
         }

}
   
echo "Value received  :  $name : $roll_no : $email : $branch : $phone_no : $cgpa";
?>
