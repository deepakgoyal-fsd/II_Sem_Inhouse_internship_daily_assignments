<?php 
include("db_connect.php");
include("checkLoginError.php");
include("header.php");
 ?>

<div class="container mt-5" style="max-width:400px;">
	<?php if (!empty($error)): ?>
		<div class="alert alert-danger"><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></div>
	<?php endif; ?>
	<form action="" method="post">
		<h3 class="mb-3">Login</h3>

		<input type="email" class="form-control mb-3" placeholder="Email" name="email" required value="<?php echo htmlspecialchars($email, ENT_QUOTES, 'UTF-8'); ?>">
		<input type="password" class="form-control mb-3" placeholder="Password" name="password" required>
		<button type="submit" class="btn btn-primary w-100">Login</button>
	</form>
</div>
<?php include("footer.php"); ?>