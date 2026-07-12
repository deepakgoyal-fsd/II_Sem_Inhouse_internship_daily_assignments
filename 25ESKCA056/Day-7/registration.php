<?php

$name=$_POST['Name'];

$email=$_POST['Email'];

$phone=$_POST['phone'];

$gender=$_POST['gender'];

$dob=$_POST['dtDOB'];

$address=$_POST['address'];

$country=$_POST['country'];

$branch=$_POST['branch'];



// Name Validation

if(empty($name))
{

die("Name cannot be empty.");

}

// Email Validation

if(!filter_var($email,FILTER_VALIDATE_EMAIL))
{

die("Invalid Email.");

}

// Mobile Validation

if(!preg_match("/^[0-9]{10}$/",$phone))
{

die("Phone number should contain exactly 10 digits.");

}



// Image Upload

$targetDir="uploads/";

if(!file_exists($targetDir))
{

mkdir($targetDir);

}

$imageName=basename($_FILES["photo"]["name"]);

$targetFile=$targetDir.$imageName;

$imageType=strtolower(pathinfo($targetFile,PATHINFO_EXTENSION));

$allowed=array("jpg","jpeg","png","gif");

if(!in_array($imageType,$allowed))
{

die("Only JPG, JPEG, PNG and GIF images are allowed.");

}

move_uploaded_file($_FILES["photo"]["tmp_name"],$targetFile);

?>

<!DOCTYPE html>

<html>

<head>

<title>Registration Details</title>

<style>

body{

font-family:Arial;

background:#B5BAFF;

}

.container{

width:600px;

margin:auto;

background:white;

padding:20px;

margin-top:40px;

border-radius:10px;

}

img{

width:200px;

border-radius:10px;

}

</style>

</head>

<body>

<div class="container">

<h2>Registration Successful</h2>

<hr>

<p><b>Name :</b> <?php echo $name; ?></p>

<p><b>Email :</b> <?php echo $email; ?></p>

<p><b>Phone :</b> <?php echo $phone; ?></p>

<p><b>Gender :</b> <?php echo $gender; ?></p>

<p><b>DOB :</b> <?php echo $dob; ?></p>

<p><b>Address :</b> <?php echo $address; ?></p>

<p><b>Country :</b> <?php echo $country; ?></p>

<p><b>Branch :</b> <?php echo $branch; ?></p>

<h3>Uploaded Image</h3>

<img src="<?php echo $targetFile; ?>">

</div>

</body>

</html>