<?php

include("dashhead.php");
include("dashboardvertContent.php");
include("checkUpdatePassword.php");
?>
<div class="container mt-5" style="max-width:400px;">
	<?php if (!empty($error)): ?>
		<div class="alert alert-danger"><?php echo htmlspecialchars($error); ?></div>
	<?php endif; ?>
	
	<form action="" method="post">
		<h3 class="mb-3">Update Password</h3>

		<input type="password" class="form-control mb-3" placeholder="oldpassword" name="old_password">
        <input type="password" class="form-control mb-3" placeholder="newpassword" name="new_password">
		<input type="password" class="form-control mb-3" placeholder="ConfirmPassword" name="confirm_password" required>
		<button type="submit" class="btn btn-primary w-100">Update</button>
	</form>
</div>
<?php
include("dashboardfooter.php");
include("footer.php");
?>