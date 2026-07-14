<?php

include("../includes/admin-auth.php");
include("../includes/db.php");

$totalUsers=mysqli_fetch_assoc(
mysqli_query($conn,
"SELECT COUNT(*) total FROM users")
);

$totalAdmins=mysqli_fetch_assoc(
mysqli_query($conn,
"SELECT COUNT(*) total FROM users
WHERE role='admin'")
);

$totalClicks=mysqli_fetch_assoc(
mysqli_query($conn,
"SELECT SUM(click_count) total
FROM users")
);

$today=mysqli_fetch_assoc(
mysqli_query($conn,
"SELECT COUNT(*) total
FROM users
WHERE DATE(created_at)=CURDATE()")
);

include("includes/header.php");

?>

<div class="container-fluid">

<div class="row">

<div class="col-md-2">

<?php include("includes/sidebar.php"); ?>

</div>

<div class="col-md-10 p-4">

<h2>

Welcome Admin 👋

</h2>

<hr>

<div class="row">

<div class="col-md-3">

<div class="card bg-primary text-white">

<div class="card-body">

<h5>Total Users</h5>

<h2><?= $totalUsers['total'] ?></h2>

</div>

</div>

</div>

<div class="col-md-3">

<div class="card bg-success text-white">

<div class="card-body">

<h5>Total Admins</h5>

<h2><?= $totalAdmins['total'] ?></h2>

</div>

</div>

</div>

<div class="col-md-3">

<div class="card bg-warning">

<div class="card-body">

<h5>Total Clicks</h5>

<h2><?= $totalClicks['total'] ?></h2>

</div>

</div>

</div>

<div class="col-md-3">

<div class="card bg-danger text-white">

<div class="card-body">

<h5>Today's Users</h5>

<h2><?= $today['total'] ?></h2>

</div>

</div>

</div>

</div>

</div>

</div>

</div>

<?php

include("includes/footer.php");

?>