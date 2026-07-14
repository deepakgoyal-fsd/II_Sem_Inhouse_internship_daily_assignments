<?php

include("includes/auth.php");
include("includes/db.php");
include("includes/header.php");

$id = $_SESSION['user_id'];

$query = mysqli_query($conn,
"SELECT * FROM users WHERE id='$id'");

$user = mysqli_fetch_assoc($query);

?>

<div class="container mt-5">

<div class="row justify-content-center">

<div class="col-lg-8">

<div class="card shadow">

<div class="card-header bg-success text-white">

<h3>My Profile</h3>

</div>

<div class="card-body">

<table class="table table-bordered">

<tr>

<th width="35%">Full Name</th>

<td><?= htmlspecialchars($user['name']) ?></td>

</tr>

<tr>

<th>Email</th>

<td><?= htmlspecialchars($user['email']) ?></td>

</tr>

<tr>

<th>Phone</th>

<td><?= htmlspecialchars($user['phone']) ?></td>

</tr>

<tr>

<th>Gender</th>

<td><?= htmlspecialchars($user['gender']) ?></td>

</tr>

<tr>

<th>Date of Birth</th>

<td><?= htmlspecialchars($user['dob']) ?></td>

</tr>

<tr>

<th>Address</th>

<td><?= htmlspecialchars($user['address']) ?></td>

</tr>

<tr>

<th>Role</th>

<td><?= ucfirst($user['role']) ?></td>

</tr>

<tr>

<th>Total Clicks</th>

<td><?= $user['click_count'] ?></td>

</tr>

<tr>

<th>Registered On</th>

<td><?= $user['created_at'] ?></td>

</tr>

</table>

<div class="text-center mt-4">

<a
href="update-profile.php"
class="btn btn-warning me-2">

Update Profile

</a>

<a
href="change-password.php"
class="btn btn-info text-white">

Change Password

</a>

</div>

</div>

</div>

</div>

</div>

</div>

<?php
include("includes/footer.php");
?>