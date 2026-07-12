<?php
include ("header.php");
include ("chechRegistration.php");
?>

<div class="container mt-5"
style="max-width:400px;">
<form action="" method = "post">
    <h3 class="mb-3">Register</h3>

    <input type="text" name="name" class="form-control mb-3" placeholder="Name">
    <input type="email" name="email" class="form-control mb-3" placeholder="Email">
    <input type="password" name="password"class="form-control mb-3" placeholder="Password">
    <input type="confirmPassword" name="confirmPassword" class="form-control mb-3" placeholder=" confirm Password">

    <button class="btn btn-primart w-100">Register</button>
</form>
</div>
