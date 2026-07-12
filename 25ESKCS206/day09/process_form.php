<?php
require_once('db_connect.php');

$isPost = ($_SERVER['REQUEST_METHOD'] == 'POST');
$registrationSuccess = false;
$errorMessage = "";

$name = "";
$email = "";
$branch = "";
$cgpa = "";

if ($isPost && (!isset($conn) || !$conn)) {
    $errorMessage = "Database connection failed.";
}

if ($isPost) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $branch = mysqli_real_escape_string($conn, $_POST['branch']);
    $cgpa = mysqli_real_escape_string($conn, $_POST['cgpa']);
    
    $sql = "INSERT INTO students (name, email, branch, cgpa) VALUES ('$name', '$email', '$branch', '$cgpa')";

    if (mysqli_query($conn, $sql)) {
        $registrationSuccess = true;
    } else {
        $errorMessage = "Database Error: " . mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration Hub</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #0f172a;
            color: #f8fafc;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .registration-card {
            max-width: 550px;
            width: 100%;
            background-color: #1e293b;
            border: 1px solid #334155;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
        }
        .form-control, .form-select {
            background-color: #0f172a;
            border: 1px solid #334155;
            color: #f8fafc;
        }
        .form-control:focus, .form-select:focus {
            background-color: #0f172a;
            border-color: #38bdf8;
            color: #f8fafc;
            box-shadow: 0 0 0 0.25rem rgba(56, 189, 248, 0.25);
        }
        .data-label {
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            color: #94a3b8;
        }
        .data-value {
            font-weight: 600;
            color: #e2e8f0;
        }
    </style>
</head>
<body>

    <div class="registration-card p-4 m-3">
        <?php if ($isPost && $registrationSuccess): ?>
            <div class="alert alert-success border-0 shadow-sm text-center p-4 mb-4" role="alert">
                <h2 class="alert-heading fw-bold">Student Registered Successfully!</h2>
                <p class="mb-0 mt-2 small">The profile record is now visible within phpMyAdmin.</p>
            </div>

            <div class="px-2">
                <h5 class="fw-bold text-info mb-3 pb-1 border-bottom border-secondary">Submission Summary</h5>
                
                <div class="mb-3">
                    <div class="data-label">Full Name</div>
                    <div class="data-value"><?php echo htmlspecialchars($name); ?></div>
                </div>

                <div class="mb-3">
                    <div class="data-label">Email Address</div>
                    <div class="data-value"><?php echo htmlspecialchars($email); ?></div>
                </div>

                <div class="mb-3">
                    <div class="data-label">Academic Branch</div>
                    <div class="data-value"><?php echo htmlspecialchars($branch); ?></div>
                </div>

                <div class="mb-4">
                    <div class="data-label">Calculated CGPA</div>
                    <div class="data-value"><?php echo htmlspecialchars($cgpa); ?></div>
                </div>

                <a href="feedback.php" class="btn btn-outline-info w-100 fw-bold py-2">Register Another Student</a>
            </div>
        <?php else: ?>
            <div class="text-center mb-4">
                <h2 class="fw-bold text-info m-0">Student Registration Form</h2>
                <p class="text-muted small mt-1">Submit dynamic metrics directly into database storage</p>
            </div>

            <?php if ($errorMessage !== ""): ?>
                <div class="alert alert-danger border-0 p-3 mb-3 small" role="alert">
                    <?php echo $errorMessage; ?>
                </div>
            <?php endif; ?>

            <form action="feedback.php" method="POST">
                <div class="mb-3">
                    <label for="name" class="form-label text-muted small text-uppercase fw-bold">Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label text-muted small text-uppercase fw-bold">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>

                <div class="mb-3">
                    <label for="branch" class="form-label text-muted small text-uppercase fw-bold">Branch</label>
                    <select class="form-select" id="branch" name="branch" required>
                        <option value="" selected disabled>Select your branch</option>
                        <option value="Computer Science">Computer Science</option>
                        <option value="Mechanical Engineering">Mechanical Engineering</option>
                        <option value="Business Administration">Business Administration</option>
                        <option value="Graphic Design">Graphic Design</option>
                        <option value="Economics">Economics</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label for="cgpa" class="form-label text-muted small text-uppercase fw-bold">CGPA Metric</label>
                    <input type="number" step="0.01" min="0" max="10" class="form-control" id="cgpa" name="cgpa" placeholder="e.g. 8.7" required>
                </div>

                <button type="submit" class="btn btn-info w-100 fw-bold text-dark py-2">Submit and Save Record</button>
            </form>
        <?php endif; ?>
    </div>

</body>
</html>