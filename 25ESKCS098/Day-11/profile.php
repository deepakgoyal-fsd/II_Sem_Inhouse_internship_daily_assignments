<?php

session_start();

if(!isset($_SESSION['user_id'])){

header("Location: login.php");

exit();

}

include("db_connect.php");

$id=$_SESSION['user_id'];

$result=mysqli_query($conn,"SELECT * FROM users WHERE id=$id");

$user=mysqli_fetch_assoc($result);

if(isset($_POST['upload'])){

$image=$_FILES['photo']['name'];

$tmp=$_FILES['photo']['tmp_name'];

move_uploaded_file($tmp,"uploads/".$image);

mysqli_query($conn,"UPDATE users SET profile_picture='$image' WHERE id=$id");

header("Location: profile.php");

exit();

}

?>

<!DOCTYPE html>

<html>

<head>

<title>Profile</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container mt-5">

<h2>My Profile</h2>

<img src="uploads/<?php echo $user['profile_picture']; ?>" width="150" height="150">

<br><br>

<p><b>Name :</b> <?php echo $user['name']; ?></p>

<p><b>Email :</b> <?php echo $user['email']; ?></p>

<form method="POST" enctype="multipart/form-data">

<input
type="file"
name="photo"
class="form-control mb-3"
required>

<button
type="submit"
name="upload"
class="btn btn-success">

Upload Picture

</button>

</form>

<br>

<a href="dashboard.php" class="btn btn-secondary">

Back

</a>

</div>

</body>

</html>