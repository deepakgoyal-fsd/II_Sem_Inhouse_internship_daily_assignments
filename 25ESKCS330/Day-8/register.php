<?php

include "db.php";

$errors=[];

$name=trim($_POST["name"]);
$email=trim($_POST["email"]);
$phone=trim($_POST["phone"]);
$gender=$_POST["gender"] ?? "";
$course=$_POST["course"];
$address=trim($_POST["address"]);

$photo="";

if(!preg_match("/^[a-zA-Z ]+$/",$name)){
    $errors[]="Name should contain only letters.";
}

if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
    $errors[]="Invalid Email Address.";
}

if(!preg_match("/^[0-9]{10}$/",$phone)){
    $errors[]="Phone number should contain exactly 10 digits.";
}

if(empty($gender)){
    $errors[]="Please select Gender.";
}

if(strlen($address)<10){
    $errors[]="Address must be at least 10 characters.";
}

if(count($errors)==0){

    if(isset($_FILES["photo"]) && $_FILES["photo"]["name"]!=""){

       $uploadFolder = __DIR__ . "/uploads/";

if(!is_dir($uploadFolder)){
    mkdir($uploadFolder,0777,true);
}

$photo = time()."_".basename($_FILES["photo"]["name"]);

if(!move_uploaded_file(
    $_FILES["photo"]["tmp_name"],
    $uploadFolder.$photo
)){
    die("Image Upload Failed");
}
    }

    $sql="INSERT INTO students(name,email,phone,gender,course,address,photo)
    VALUES('$name','$email','$phone','$gender','$course','$address','$photo')";

    mysqli_query($conn,$sql);

}

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Registration Status</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

<style>

body{
background:linear-gradient(135deg,#4facfe,#00f2fe);
min-height:100vh;
display:flex;
justify-content:center;
align-items:center;
padding:30px;
}

.card{
border-radius:20px;
overflow:hidden;
}

.profile{
width:170px;
height:170px;
border-radius:50%;
object-fit:cover;
border:5px solid #0d6efd;
}

</style>

</head>

<body>

<div class="container">

<div class="row justify-content-center">

<div class="col-lg-7">

<?php

if(count($errors)>0){

?>

<div class="alert alert-danger shadow">

<h3>

<i class="fa-solid fa-circle-xmark"></i>

Validation Errors

</h3>

<hr>

<ul>

<?php

foreach($errors as $error){

echo "<li>$error</li>";

}

?>

</ul>

<a href="index.php" class="btn btn-danger">

Go Back

</a>

</div>

<?php

}

else{

?>

<div class="card shadow-lg">

<div class="card-header bg-success text-white text-center">

<h2>

<i class="fa-solid fa-circle-check"></i>

Registration Successful

</h2>

</div>

<div class="card-body text-center">

<?php

if($photo!=""){

?>

<img

src="uploads/<?php echo $photo;?>"

class="profile mb-4"

>

<?php

}

?>

<table class="table table-bordered">

<tr>

<th>Name</th>

<td><?php echo $name;?></td>

</tr>

<tr>

<th>Email</th>

<td><?php echo $email;?></td>

</tr>

<tr>

<th>Phone</th>

<td><?php echo $phone;?></td>

</tr>

<tr>

<th>Gender</th>

<td><?php echo $gender;?></td>

</tr>

<tr>

<th>Course</th>

<td><?php echo $course;?></td>

</tr>

<tr>

<th>Address</th>

<td><?php echo $address;?></td>

</tr>

</table>

<div class="d-grid gap-2">

<a href="index.php" class="btn btn-primary">

<i class="fa-solid fa-user-plus"></i>

Register Another Student

</a>

<a href="students.php" class="btn btn-success">

<i class="fa-solid fa-users"></i>

View All Students

</a>

</div>

</div>

</div>

<?php

}

?>

</div>

</div>

</div>

</body>

</html>