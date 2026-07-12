<?php

session_start();

if (!isset($_SESSION['user_id'])) {

    header("Location: login.php");
    exit();

}

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>My Profile</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

<div class="row justify-content-center">

<div class="col-md-6">

<div class="card shadow">

<div class="card-header bg-primary text-white">

<h3>My Profile</h3>

</div>

<div class="card-body text-center">

<img src="../day1/PIYUSHPHOTO.jpg"
class="rounded-circle mb-3"
width="150"
height="150"
alt="Profile Picture">

<h4>

<?php echo htmlspecialchars($_SESSION['user_name']); ?>

</h4>

<p>

<?php echo htmlspecialchars($_SESSION['user_email']); ?>

</p>

<a href="dashboard.php" class="btn btn-primary">

Back to Dashboard

</a>

</div>

</div>

</div>

</div>

</div>

</body>

</html>