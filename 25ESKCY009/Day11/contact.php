<?php 
include("header.php");
?>

<div class="container mt-5">
	<div class="row">
		<div class="col-md-6 offset-md-3">
			<h1 class="mb-4">Contact Us</h1>
			<form action="" method="post">
				<div class="mb-3">
					<label class="form-label">Name</label>
					<input type="text" class="form-control" name="name" required>
				</div>
				<div class="mb-3">
					<label class="form-label">Email</label>
					<input type="email" class="form-control" name="email" required>
				</div>
				<div class="mb-3">
					<label class="form-label">Message</label>
					<textarea class="form-control" name="message" rows="4" required></textarea>
				</div>
				<button type="submit" class="btn btn-primary w-100">Send</button>
			</form>
			<p class="text-muted mt-3">Email: info@example.com | Phone: +1 (555) 123-4567</p>
		</div>
	</div>
</div>

<?php include("footer.php"); ?>
