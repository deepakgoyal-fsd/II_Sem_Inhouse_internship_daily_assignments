<?php include 'db_connect.php'; ?>
<!DOCTYPE html>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container py-5">
        <h2>Student Registration</h2>
        <form action="process_form.php" method="POST">
            <input class="form-control mb-2" name="name" placeholder="Name" required>
            <input class="form-control mb-2" type="email" name="email" placeholder="Email" required>
            <input class="form-control mb-2" name="branch" placeholder="Branch" required>
            <input class="form-control mb-2" type="number" step="0.01" name="cgpa" placeholder="CGPA" required>
            <button class="btn btn-primary">Register</button>
            <a href="students.php" class="btn btn-success">View Students</a>
        </form>
    </div>
</body>

</html>