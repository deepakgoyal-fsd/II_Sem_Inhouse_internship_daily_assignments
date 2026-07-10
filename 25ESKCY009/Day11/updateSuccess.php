<?php 
include("dashhead.php");
include("dashboardvertContent.php");
?>

<div class="container mt-5" style="max-width:500px;">
	<div class="alert alert-success" role="alert">
		<h4 class="alert-heading">Success!</h4>
		<p>Your password has been updated successfully.</p>
		<hr>
		<p class="mb-0">You can now use your new password to login.</p>
	</div>
	
	<div class="mt-3">
		<a href="dashboard.php" class="btn btn-primary w-100">Back to Dashboard</a>
	</div>
</div>

<?php include("dashboardfooter.php");
include("footer.php"); ?>
