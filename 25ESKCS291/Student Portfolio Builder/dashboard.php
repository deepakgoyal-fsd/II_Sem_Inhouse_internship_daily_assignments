<?php
session_start();
if(!isset($_SESSION['user_id']))
{
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body class="bg-light">
<div class="container py-5">
    <div class="text-center mb-5">
        <h2 class="fw-bold text-success">
            Student Portfolio Builder
        </h2>
        <h4 class="mt-3">
            Welcome, <?php echo $_SESSION['username']; ?> 
        </h4>
        <p class="text-muted">
            Manage your portfolio from here.
        </p>
    </div>
    <div class="row g-4">
        <div class="col-md-4">
            <div class="card shadow border-0 p-4 h-100 text-center">
                <h5>Create / Edit Portfolio</h5>
                <p>
                    Add your education, skills and projects.
                </p>
                <a href="portfolio.php" class="btn btn-success">
                    Manage Portfolio
                </a>
            </div>
        </div>
        <div class="col-md-4">
    <div class="card shadow border-0 p-4 h-100 text-center">
        <h5>View My Portfolio</h5>
        <p>
            Preview your portfolio.
        </p>

        <a href="view_portfolio.php?username=<?php echo $_SESSION['username']; ?>" class="btn btn-success">
            View Portfolio
        </a>

    </div>
</div>
        <div class="col-md-4">
            <div class="card shadow border-0 p-4 h-100 text-center">
                <h5>Logout</h5>
                <p>
                    Sign out of your account.
                </p>
                <a href="logout.php" class="btn btn-danger">
                    Logout
                </a>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>