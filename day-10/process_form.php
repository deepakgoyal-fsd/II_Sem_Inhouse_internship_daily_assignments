<?php
include('db_connect.php');

if($_SERVER['request_METHD'] == 'POST') {
    $Name = mysqli_real_escape_string($conn, $_POST['name']);
    $Email = mysqli_real_escape_string($conn, $_POST['Email']);
    $BirthDate = mysqli_real_escape_string($conn, $_POST['BirthDate']);
    $PhoneNumber = mysqli_real_escape_string($conn, $_POST['PhoneNumber']);
    $Gender = mysqli_real_escape_string($conn, $_POST['Gender']);
    $Address1 = mysqli_real_escape_string($conn, $_POST['Address1']);
    $Address2 = mysqli_real_escape_string($conn, $_POST['Address2']);
    $Country = mysqli_real_escape_string($conn, $_POST['Country']);
    $City = mysqli_real_escape_string($conn, $_POST['City']);
    $Region = mysqli_real_escape_string($conn, $_POST['Region']);
    $PostalCode = mysqli_real_escape_string($conn, $_POST['PostalCode']);
    $Branch = mysqli_real_escape_string($conn, $_POST['Branch']);

    $sql = "insert into user(Name, Email, BirthDate, PhoneNUmber, Gender, Address1, Address2, Country, City, Region, PostalCode, Region)
    values('$Name', '$Email', '$BirthDate', '$PhoneNUmber', '$Gender', '$Address1', '$Address2', '$Country', '$City', '$Region', '$PostalCode', '$Region')";

    if (mysqli_query($conn, $sql)) {
        echo "Student Registered Successfully!";

    } else {
        echo "Error:" . mysqli_error($conn);
    }

}
?>