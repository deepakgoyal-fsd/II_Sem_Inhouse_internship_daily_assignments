<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h3 class="text-center">Student Registration Form</h3>
        </div>

        <div class="card-body">

            <form action="process.php" method="POST">

                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Branch</label>
                    <input type="text" name="branch" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">CGPA</label>
                    <input type="number" step="0.01" name="cgpa" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-success">
                    Register Student
                </button>

                <a href="students.php" class="btn btn-primary">
                    View Students
                </a>

            </form>

        </div>
    </div>

</div>

</body>
</html>