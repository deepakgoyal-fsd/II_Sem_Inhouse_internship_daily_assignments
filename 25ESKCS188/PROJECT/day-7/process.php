<!DOCTYPE html>
<html>

<head>

<title>Registration Result</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<?php

$name=$_POST['name'];

$email=$_POST['email'];

$branch=$_POST['branch'];

$phone=$_POST['phone'];

$errors=[];

if(empty($name)){

$errors[]="Name cannot be empty.";

}

if(!filter_var($email,FILTER_VALIDATE_EMAIL)){

$errors[]="Please enter a valid email address.";

}

if(strlen($phone)!=10 || !is_numeric($phone)){

$errors[]="Phone number must contain exactly 10 digits.";

}

?>

<div class="container mt-5">

<?php

if(count($errors)>0){

?>

<div class="alert alert-danger">

<h4>Errors</h4>

<ul>

<?php

foreach($errors as $error){

echo "<li>$error</li>";

}

?>

</ul>

</div>

<?php

}

else{

?>

<div class="card shadow p-4">

<h2>

Registration Received

</h2>

<hr>

<h4>

Welcome,

<?php echo $name; ?>

</h4>

<p><b>Name :</b> <?php echo $name; ?></p>

<p><b>Email :</b> <?php echo $email; ?></p>

<p><b>Branch :</b> <?php echo $branch; ?></p>

<p><b>Phone :</b> <?php echo $phone; ?></p>

</div>

<?php

}

?>

</div>

</body>

</html>