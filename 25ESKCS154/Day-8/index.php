<?php $page='home'; include 'header.php'; ?>
<div class="card p-4">
<h2>Registration Form</h2>
<form method="POST" action="result.php">
<input class="form-control mb-3" name="name" placeholder="Name" required>
<input class="form-control mb-3" type="email" name="email" placeholder="Email" required>
<input class="form-control mb-3" type="number" step="0.1" name="cgpa" placeholder="CGPA" required>
<input class="form-control mb-3" name="branch" placeholder="Branch" required>
<input class="form-control mb-3" name="college" placeholder="College" required>
<button class="btn btn-primary">Submit</button>
</form></div>
<?php include 'footer.php'; ?>