<html>
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>eb Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>


<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
require_once("roles.php");
?>
<body>
    <header class="bg-light border-bottom">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center py-3">
                <img src="images/logo.jpg" alt="Logo" width="80">
                <nav>
                    <ul class="nav">
                        <li class="nav-item">
                            <?php if (isset($_SESSION["user_id"])): ?>
                                <?php $home = (isset($_SESSION["user_role"]) && isHeadAdmin($_SESSION["user_role"])) ? "headAdminDashboard.php" : "dashboard.php"; ?>
                                <a class="nav-link text-dark" href="<?= $home ?>">Home</a>
                            <?php else: ?>
                                <a class="nav-link text-dark" href="registeration.php">Home</a>
                            <?php endif; ?>
                        </li>
                        <li class="nav-item">
                            <a href="about.php" class="nav-link text-dark">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a href="contact.php" class="nav-link text-dark">Contact Us</a>
                        </li>
                    </ul>
                </nav>

                <div class="d-flex align-items-center gap-2">
                    <?php if(isset($_SESSION["user_id"])): ?>
                        <a href="logout.php" class="btn btn-outline-danger btn-sm">Logout</a>
                        <a href="updatePassword.php" class="btn btn-outline-secondary btn-sm">Update Password</a>
                    <?php else: ?>
                        <a href="login.php" class="btn btn-primary btn-sm">Login</a>
                    <?php endif; ?>
                </div>

            </div>
        </div>
    </header>