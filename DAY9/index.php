<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Student Registration Portal</title>
<link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{
            background: linear-gradient(135deg,#4facfe,#00f2fe);
            min-height:100vh;
        }
        .card{
            border:none;
            border-radius:15px;
            box-shadow:0 10px 20px rgba(0,0,0,0.2);
        }
        .navbar{
            box-shadow:0 2px 10px rgba(0,0,0,0.2);
        }
        h2{
            font-weight:bold;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-dark bg-dark">
    <div class="container">
        <span class="navbar-brand fw-bold">
            🎓 Student Registration Portal
        </span>
        <a href="view_students.php" class="btn btn-warning">
            View Students
        </a>
    </div>
</nav>

<div class="container mt-5">

    <div class="row justify-content-center">

        <div class="col-md-7">

            <div class="card p-4">

                <h2 class="text-center text-primary mb-4">
                    Student Registration Form
                </h2>

                <?php
                if(isset($_GET['success']))
                {
                    echo "<div class='alert alert-success'>
                    Student Registered Successfully!
                    </div>";
                }

                if(isset($_GET['error']))
                {
                    echo "<div class='alert alert-danger'>
                    ".$_GET['error']."
                    </div>";
                }
                ?>

                <form action="register.php" method="POST">

                    <div class="mb-3">
                        <label class="form-label">Full Name</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Phone Number</label>
                        <input type="text" name="phone" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Course</label>
                        <select name="course" class="form-select" required>
                            <option value="">Select Course</option>
                            <option>B.Tech AI</option>
                            <option>B.Tech CSE</option>
                            <option>B.Tech IT</option>
                            <option>BCA</option>
                            <option>MCA</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">CGPA</label>
                        <input type="number" name="cgpa" class="form-control" step="0.01" min="0" max="10" required>
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary btn-lg">
                            Register Student
                        </button>
                    </div>

                </form>

            </div>

        </div>

    </div>

</div>

</body>
</html>