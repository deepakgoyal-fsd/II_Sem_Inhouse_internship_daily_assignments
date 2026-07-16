<?php include 'header.php'; ?>
<?php include 'db.php'; ?>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card p-4">
                <h2>Registration Form</h2>
                <form action="process.php" method="POST">
                    <div class="mb-3">
                        <label class="form-label">Full Name</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">CGPA</label>
                        <input type="number" step="0.01" name="cgpa" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Branch</label>
                        <input type="text" name="branch" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">College</label>
                        <input type="text" name="college" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Submit Registration</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>