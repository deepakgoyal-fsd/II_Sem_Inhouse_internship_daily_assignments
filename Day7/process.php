<?php 

function safe($key) {
    return htmlspecialchars(trim($_POST[$key] ?? ''), ENT_QUOTES, 'UTF-8');
}


$name = safe('name');
$college = safe('college');
$branch = safe('branch');
$email = safe('email');
$phone = safe('phone');
$gender = safe('gender');

if (!$name || !$college || !$branch || !$email || !$phone || !$gender) {
    echo '<p>All fields are required. Please go back and fill in the form.</p>';
    echo '<p><a href="register.php">Back to registration</a></p>';
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Submitted</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-7 col-lg-6">
            <div class="card shadow-lg rounded-4">
                <div class="card-header bg-success text-white text-center">
                    <h2 class="h4 mb-0">Registration Submitted</h2>
                </div>
                <div class="card-body">
                    <p class="mb-4">Thank you for registering. Here are the details you submitted:</p>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><strong>Name:</strong> <?php echo $name; ?></li>
                        <li class="list-group-item"><strong>College:</strong> <?php echo $college; ?></li>
                        <li class="list-group-item"><strong>Branch:</strong> <?php echo $branch; ?></li>
                        <li class="list-group-item"><strong>Email:</strong> <?php echo $email; ?></li>
                        <li class="list-group-item"><strong>Phone:</strong> <?php echo $phone; ?></li>
                        <li class="list-group-item"><strong>Gender:</strong> <?php echo $gender; ?></li>
                    </ul>
                    <div class="mt-4 d-grid">
                        <a href="register.php" class="btn btn-primary">Register Another Student</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>