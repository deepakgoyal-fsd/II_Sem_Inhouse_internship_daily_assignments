<html>
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<?php
require_once("roles.php");
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
?>

<body>
    <header class="bg-light border-bottom">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center py-3">
                <img src="images/logo.jpg" alt="Logo" width="80">
                <?php
                if(isset($_SESSION["user_id"])){
                    if(isset($_SESSION["user_role"]) && $_SESSION["user_role"] == ROLE_HEAD_ADMIN){
                        $home = "headAdminDashboard.php";
                    }else{
                        $home = "dashboard.php";
                    }
                }else{
                    $home = "registeration.php";
                }
                ?>
                <nav>
                    <ul class="nav">
                        <li class="nav-item">
                            <?php if (isset($_SESSION["user_id"])): ?>
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
                    <?php if (isset($_SESSION["user_id"])): ?>
                        <a href="logout.php" class="btn btn-outline-danger btn-sm">Logout</a>
                    <?php else: ?>
                        <a href="login.php" class="btn btn-primary btn-sm text-white text-decoration-none">Login</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </header>
