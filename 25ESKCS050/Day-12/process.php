<?php

include "auth.php";
include "db.php";


$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$branch = $_POST['branch'];
$college = $_POST['college'];
$cgpa = $_POST['cgpa'];
$gender = $_POST['gender'];
$course = $_POST['course'];
$address = $_POST['address'];
$status = $_POST['status'];



// PHOTO UPLOAD

$photo = "profile.png";


if(isset($_FILES['photo']) && $_FILES['photo']['name']!=""){

    $photo = $_FILES['photo']['name'];

    move_uploaded_file(
        $_FILES['photo']['tmp_name'],
        "uploads/".$photo
    );

}




$sql = "INSERT INTO students

(name,email,phone,branch,college,cgpa,gender,course,address,photo,status)

VALUES

('$name',
'$email',
'$phone',
'$branch',
'$college',
'$cgpa',
'$gender',
'$course',
'$address',
'$photo',
'$status')";




if(mysqli_query($conn,$sql)){


    echo "

    <script>

    alert('Student Added Successfully');
    window.location='students.php';

    </script>

    ";


}
else{


    echo mysqli_error($conn);


}


?>