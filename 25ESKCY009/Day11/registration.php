<?php 
include("header.php");
include("db_connect.php");
include("checkRegError.php"); ?>

<div class="container mt-5" style="max-width:400px;">
	<form action="" method="post">
		<h3 class="mb-3">Registration Form</h3>

		<input type="text" class="form-control mb-3" placeholder="Name" name="name" required>
		<input type="email" class="form-control mb-3" placeholder="Email" name="email" required>
		<input type="password" class="form-control mb-3" placeholder="Password" name="password" required>
		<input type="password" class="form-control mb-3" placeholder="Confirm Password" name="confirm_password" required>
		<button type="submit" class="btn btn-primary w-100">Register</button>
	</form>
</div>
<?php include("footer.php"); ?>

