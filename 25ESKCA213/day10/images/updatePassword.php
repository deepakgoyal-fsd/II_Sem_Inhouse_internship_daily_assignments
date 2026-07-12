<?php
session_start();
include("dashboardHeader.php");
include("checkUpdateError.php");
?>

<div class="container mt-5" style="max-width:400px;">

<form action="" method="post">

<h3 class="mb-3">Update Password</h3>

<input type="password" class="form-control mb-3" name="oldPassword" placeholder= "old Password">

<input type="password" class="form-control mb-3" name="newPassword" placeholder="new Password">

<input type="password" class="form-control mb-3" name="confirmPassword" placeholder="confirm Password">


<button class="btn btn-primary w-100">Update</button>

<?php

include ("footer.php");?>