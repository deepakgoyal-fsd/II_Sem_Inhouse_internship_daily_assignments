<?php

include("includes/auth.php");
include("includes/db.php");
include("includes/header.php");

$id = $_SESSION['user_id'];

$result = mysqli_query($conn,
"SELECT * FROM users WHERE id='$id'");

$user = mysqli_fetch_assoc($result);

?>

<div class="container mt-5">

<div class="row">

<div class="col-md-12">

<div class="card shadow">

<div class="card-body">

<h2>

Welcome,
<?= $user['name']; ?>

👋

</h2>

<hr>

<h5>

Email :
<?= $user['email']; ?>

</h5>

<h5>

Role :
<?= ucfirst($user['role']); ?>

</h5>

<hr>

<h3>

Click Counter

</h3>

<h1 id="count">

<?= $user['click_count']; ?>

</h1>

<button
id="clickBtn"
class="btn btn-primary">

Click Me

</button>

</div>

</div>

</div>

</div>

<br>

<div class="row">

<div class="col-md-3">

<a href="profile.php" class="btn btn-success w-100">

My Profile

</a>

</div>

<div class="col-md-3">

<a href="update-profile.php"
class="btn btn-warning w-100">

Update Profile

</a>

</div>

<div class="col-md-3">

<a href="change-password.php"
class="btn btn-info w-100">

Change Password

</a>

</div>

<div class="col-md-3">

<a href="logout.php"
class="btn btn-danger w-100">

Logout

</a>

</div>

</div>

</div>

<script>

$("#clickBtn").click(function(){

    $.get("click-counter.php",function(data){

        $("#count").html(data);

    });

});

</script>

<?php
include("includes/footer.php");
?>