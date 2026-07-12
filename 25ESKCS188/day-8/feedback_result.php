<!DOCTYPE html>
<html>
<head>

<title>Result</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<?php

$name=$_POST['name'];

$email=$_POST['email'];

$message=$_POST['message'];

?>

<div class="container mt-5">

<div class="alert alert-success">

<h2>

Thank You,

<?php echo $name; ?>

</h2>

<hr>

<p><b>Email :</b> <?php echo $email; ?></p>

<p><b>Message :</b> <?php echo $message; ?></p>

</div>

</div>

</body>

</html>