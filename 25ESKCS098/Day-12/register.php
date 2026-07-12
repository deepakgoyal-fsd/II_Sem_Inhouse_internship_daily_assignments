<?php

session_start();

if(!isset($_SESSION['username'])){

header("Location: login.php");

}

?>

<!DOCTYPE html>

<html>

<head>

<title>Add Student</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container mt-5">

<h2>Add Student</h2>

<form action="insert.php" method="POST" enctype="multipart/form-data">

<input type="text" name="name" class="form-control mb-3" placeholder="Name">

<input type="email" name="email" class="form-control mb-3" placeholder="Email">

<input type="text" name="branch" class="form-control mb-3" placeholder="Branch">

<input type="text" name="phone" class="form-control mb-3" placeholder="Phone">

<input type="file" name="photo" class="form-control mb-3">

<button class="btn btn-success">

Save Student

</button>

</form>

</div>

</body>

</html>