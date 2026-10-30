<?php include 'header.php'; include 'navbar.php'; ?>
<div class="container py-5"><div class="card p-4">
<h2>Add Student</h2>
<form action="process.php" method="POST">
<input class="form-control mb-3" name="name" placeholder="Name" required>
<input class="form-control mb-3" type="email" name="email" placeholder="Email" required>
<input class="form-control mb-3" name="branch" placeholder="Branch" required>
<input class="form-control mb-3" type="number" step="0.01" name="cgpa" placeholder="CGPA" required>
<button class="btn btn-primary">Register</button>
</form></div></div>
<?php include 'footer.php'; ?>