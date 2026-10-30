<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = isset($_POST['name']) ? trim($_POST['name']) : '';
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $branch = isset($_POST['branch']) ? trim($_POST['branch']) : '';
    $phone = isset($_POST['phone']) ? trim($_POST['phone']) : '';

    if (empty($name)) {
        $errorMessage = "Error: Name field cannot be blank.";
    }
} else {
    header("Location: register.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Status</title>
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
        .summary-card {
            max-width: 500px;
            width: 100%;
            background-color: #1e293b;
            border: 1px solid #334155;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
        }
        .label-title {
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            color: #94a3b8;
        }
        .info-value {
            font-weight: 600;
            color: #e2e8f0;
        }
    </style>
</head>
<body>

    <div class="container d-flex justify-content-center">
        <?php if (isset($errorMessage)): ?>
            <div class="alert alert-danger border-0 shadow w-100 text-center fw-bold" style="max-width: 500px;" role="alert">
                <?php echo $errorMessage; ?>
                <div class="mt-3">
                    <a href="register.php" class="btn btn-sm btn-outline-danger fw-bold">Go Back</a>
                </div>
            </div>
        <?php else: ?>
            <div class="summary-card p-4">
                <div class="text-center border-bottom border-secondary pb-3 mb-4">
                    <h2 class="text-success fw-bold m-0">Registration Received</h2>
                    <p class="text-muted mt-2 mb-0">Welcome, <?php echo htmlspecialchars($name); ?>!</p>
                </div>

                <div class="mb-3">
                    <div class="label-title">Full Name</div>
                    <div class="info-value"><?php echo htmlspecialchars($name); ?></div>
                </div>

                <div class="mb-3">
                    <div class="label-title">Email Address</div>
                    <div class="info-value"><?php echo htmlspecialchars($email); ?></div>
                </div>

                <div class="mb-3">
                    <div class="label-title">Academic Branch</div>
                    <div class="info-value"><?php echo htmlspecialchars($branch); ?></div>
                </div>

                <div class="mb-4">
                    <div class="label-title">Phone Number</div>
                    <div class="info-value"><?php echo htmlspecialchars($phone); ?></div>
                </div>

                <a href="register.php" class="btn btn-outline-info w-100 fw-bold">Register Another Student</a>
            </div>
        <?php endif; ?>
    </div>

</body>
</html>