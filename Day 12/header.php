<?php
$currentPage = isset($page) ? $page : '';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Secure Admin Portal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="d-flex" id="wrapper">
        <div class="bg-dark text-white shadow" id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-4 fs-4 fw-bold text-uppercase border-bottom border-secondary d-flex align-items-center justify-content-center">
                <i class="fas fa-shield-alt text-primary fs-3 me-2"></i> SecureApp
            </div>
            <div class="list-group list-group-flush my-3 px-2">
                <a href="index.php" class="list-group-item list-group-item-action bg-transparent text-white rounded mb-1 <?= ($currentPage == 'dashboard') ? 'active-nav' : '' ?>"><i class="fas fa-tachometer-alt me-2 w-20px"></i> Dashboard</a>
                <a href="students.php" class="list-group-item list-group-item-action bg-transparent text-white rounded mb-1 <?= ($currentPage == 'students') ? 'active-nav' : '' ?>"><i class="fas fa-users me-2 w-20px"></i> View Students</a>
                <a href="add.php" class="list-group-item list-group-item-action bg-transparent text-white rounded mb-1 <?= ($currentPage == 'add') ? 'active-nav' : '' ?>"><i class="fas fa-user-plus me-2 w-20px"></i> Add Student</a>
                <a href="profile.php" class="list-group-item list-group-item-action bg-transparent text-white rounded mb-1 <?= ($currentPage == 'profile') ? 'active-nav' : '' ?>"><i class="fas fa-id-badge me-2 w-20px"></i> Admin Profile</a>
            </div>
            <div class="position-absolute bottom-0 w-100 p-3 border-top border-secondary">
                <a href="logout.php" class="btn btn-outline-danger w-100 fw-bold"><i class="fas fa-sign-out-alt me-2"></i> Logout</a>
            </div>
        </div>
        <div id="page-content-wrapper" class="flex-grow-1">
            <nav class="navbar navbar-expand-lg navbar-light bg-white py-3 px-4 shadow-sm border-bottom">
                <div class="d-flex align-items-center">
                    <i class="fas fa-bars fs-4 text-muted" id="menu-toggle" style="cursor:pointer; transition: 0.2s;"></i>
                    <h5 class="mb-0 ms-4 fw-bold text-secondary d-none d-md-block">Student Management System</h5>
                </div>
                <div class="ms-auto d-flex align-items-center">
                    <div class="dropdown">
                        <a class="text-decoration-none text-dark fw-bold dropdown-toggle d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown">
                            <?php
                            $avatar = (!empty($_SESSION['user_photo']) && file_exists('uploads/' . $_SESSION['user_photo'])) ? 'uploads/' . $_SESSION['user_photo'] : 'https://via.placeholder.com/40';
                            ?>
                            <img src="<?= $avatar ?>" class="rounded-circle me-2 border shadow-sm" width="40" height="40" style="object-fit:cover;">
                            <span class="d-none d-sm-inline"><?= htmlspecialchars($_SESSION['user_name'] ?? 'Admin') ?></span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end shadow-lg border-0 mt-3 rounded-3">
                            <li class="px-3 py-2 border-bottom mb-1">
                                <p class="mb-0 fw-bold"><?= htmlspecialchars($_SESSION['user_name'] ?? 'Admin') ?></p>
                                <p class="mb-0 text-muted small"><?= htmlspecialchars($_SESSION['user_email'] ?? '') ?></p>
                            </li>
                            <li><a class="dropdown-item py-2" href="profile.php"><i class="fas fa-user-circle me-2 text-primary w-20px"></i> My Profile</a></li>
                            <li><a class="dropdown-item py-2" href="change_password.php"><i class="fas fa-key me-2 text-warning w-20px"></i> Change Password</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item py-2 text-danger fw-bold" href="logout.php"><i class="fas fa-sign-out-alt me-2 w-20px"></i> Logout</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="container-fluid p-4 bg-light min-vh-100">