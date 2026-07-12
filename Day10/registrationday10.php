<?php
include("headerday10.php");
include("checkRegistrationerrorday10.php");
include("successday10.php");
?>

<div class="container mt-5">
	<form action="" method="post">

		<h3 class="mb-3">Register</h3>

		<input type="text" name="name" class="form-control mb-3" placeholder="Name" required>

		<input type="email" name="email" class="form-control mb-3" placeholder="Email" required>

		<input type="password" name="password" class="form-control mb-3" placeholder="Password" required>

		<input type="password" name="confirm_password" class="form-control mb-3" placeholder="Confirm Password" required>

		<button type="submit" class="btn btn-primary w-100">Register</button>
	</form>
</div>

<?php
include("footerday10.php");
?>
