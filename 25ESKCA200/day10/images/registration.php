<?php

include ("header.php");
include ("checkRegistrationError.php");
include ("db_connect.php");

?>

<div class="container mt-5" style="max-width:400px;">

<form action="" method="post">

<h3 class="mb-3">Register</h3>

<input type="text" class="form-control mb-3" name="name" placeholder="Name" value="<?=$name?>">

<input type="email" class="form-control mb-3" name="email" placeholder="Email" value="<?=$email?>">

<input type="password" class="form-control mb-3" name="password" placeholder="Password" value="<?=$password?>">
<input type="Password" class="form-control mb-3" name="confirmPassword" placeholder="confirm Password">

<button class="btn btn-primary w-100">Register</button>

<?php

include ("footer.php");?>