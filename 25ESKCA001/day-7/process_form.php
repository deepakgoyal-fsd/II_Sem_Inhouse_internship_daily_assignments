<?php 

include('db_connect.php');

if($_SERVER['REQUEST_METHOD'] == 'POST') {
   
   $fullname = mysqli_real_escape_string($conn, $_POST['fullname'] ?? "");
   $email = mysqli_real_escape_string($conn, $_POST['email'] ?? "");
   $phone = mysqli_real_escape_string($conn, $_POST['phone'] ?? "");
   $bdate = mysqli_real_escape_string($conn, $_POST['bdate'] ?? "");
   $gender = mysqli_real_escape_string($conn, $_POST['gender'] ?? "");
   $address1 = mysqli_real_escape_string($conn, $_POST['address1'] ?? "");
   $address2 = mysqli_real_escape_string($conn, $_POST['address2'] ?? "");
   $country = mysqli_real_escape_string($conn, $_POST['country'] ?? "");
   $city = mysqli_real_escape_string($conn, $_POST['city'] ?? "");
   $region = mysqli_real_escape_string($conn, $_POST['region'] ?? "");
   $postal = mysqli_real_escape_string($conn, $_POST['postal'] ?? "");

  

   $sql = "INSERT INTO student (fullname, email, phone, birth_date, gender, address_line1, address_line2, country, city, region, postal_code) 
           VALUES ('$fullname', '$email', '$phone', '$bdate', '$gender', '$address1', '$address2', '$country', '$city', '$region', '$postal')";

   if (mysqli_query($conn, $sql)) {
       echo "Student Registered Successfully!!";
   } else {
       echo "Error: " . mysqli_error($conn);
   }

}
?>

