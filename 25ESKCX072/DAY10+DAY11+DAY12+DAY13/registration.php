<?php
include ("header.php");
include("db_connect.php");
include ("checkRegistrationError.php");

//include ("checkRegistration)
?>

<div class="container mt-5"
style ="max-width:400px;">
<form action ="" method ="post">
<h3 class ="mb-3">Register </h3>
<input type ="text" name= "name" class= "form-control mb-3" placeholder ="Name">
<input type ="email" name="email"  class= "form-control mb-3" placeholder ="Email">
<input type ="password" name="password" class= "form-control mb-3" placeholder ="password ">
<input type ="password" name="confirm_password"  class= "form-control mb-3" placeholder ="confirm password ">
<button class="btn btn-primary 
w-100">Register</button>
</form>

<?php
include ("footer.php"); ?>