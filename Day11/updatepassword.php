<?php
 
 session_start();
 include("dashboardheader.php");
 ?>
   
   <div class="container mt-5" style="max-width:500px;">

<h2 class="mb-3">Update Password</h2>

<form action="checkupdateerror.php" method="POST">

<input type="password"
class="form-control mb-3"
name="old_password"
placeholder="Enter old password"
required>

<input type="password"
class="form-control mb-3"
name="new_password"
placeholder="Enter your new Password"
required>

<input type="password"
class="form-control mb-3"
name="confirm_password"
placeholder="Confirm Password"
required>

<button type="submit" class="btn btn-primary w-100">
Update
</button>

</form>

</div>
