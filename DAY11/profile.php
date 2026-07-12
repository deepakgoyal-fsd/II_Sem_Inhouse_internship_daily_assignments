<?php
include("db_connect.php");

$result = mysqli_query($conn,"SELECT * FROM users LIMIT 1");
$user = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
<title>Profile</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container mt-5">

<div class="card shadow p-4">

<h2 class="text-center text-success">
My Profile
</h2>

<div class="text-center">

<?php

if(!empty($user['photo']))
{

?>

<img src="uploads/<?php echo $user['photo']; ?>"
width="150"
height="150"
class="rounded-circle border border-primary">

<?php

}
else
{

echo "<img src='https://via.placeholder.com/150' class='rounded-circle'>";

}

?>

</div>

<hr>

<table class="table table-bordered">

<tr>

<th>Name</th>

<td><?php echo $user['name']; ?></td>

</tr>

<tr>

<th>Email</th>

<td><?php echo $user['email']; ?></td>

</tr>

<tr>

<th>Password</th>

<td>********</td>

</tr>

</table>

<h4 class="mt-4">
Update Profile Picture
</h4>

<form action="upload_photo.php"
method="POST"
enctype="multipart/form-data">

<div class="mb-3">

<input
type="file"
name="photo"
class="form-control"
required>

</div>

<button class="btn btn-primary">

Upload Photo

</button>

</form>

<br>

<a href="dashboard.php"
class="btn btn-success">

Back to Dashboard

</a>

</div>

</div>

</body>
</html>