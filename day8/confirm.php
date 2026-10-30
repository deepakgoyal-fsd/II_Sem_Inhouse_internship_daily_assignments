<?php

$name=$_POST['name'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$gender=$_POST['gender'];
$course=$_POST['course'];
$address=$_POST['address'];

$image="No Image";

if(isset($_FILES['photo']) && $_FILES['photo']['name']!=""){

$image=$_FILES['photo']['name'];

move_uploaded_file($_FILES['photo']['tmp_name'],"uploads/".$image);

}

?>

<!DOCTYPE html>
<html>

<head>

<title>Registration Confirmation</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

<link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container mt-5">

<div class="card shadow">

<div class="card-header header text-center">

<h2>

<i class="fa-solid fa-circle-check"></i>

Registration Successful

</h2>

</div>

<div class="card-body">

<?php
if($image!="No Image"){
?>

<img src="uploads/<?php echo $image; ?>" width="150" class="rounded mb-3">

<?php
}
?>

<p><strong>Name:</strong> <?php echo $name; ?></p>

<p><strong>Email:</strong> <?php echo $email; ?></p>

<p><strong>Phone:</strong> <?php echo $phone; ?></p>

<p><strong>Gender:</strong>

<span class="badge bg-success">

<?php echo $gender; ?>

</span>

</p>

<p><strong>Course:</strong>

<span class="badge bg-primary">

<?php echo $course; ?>

</span>

</p>

<p><strong>Address:</strong>

<?php echo $address; ?>

</p>

<div class="alert alert-success">

<i class="fa-solid fa-check"></i>

Registration Confirmed Successfully!

</div>

<a href="index.php" class="btn btn-primary">

Register Another Student

</a>

</div>

</div>

</div>

</body>

</html>