<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$currentUserName    = $_SESSION['user_name'] ?? 'User';
$currentUserPicture = $_SESSION['user_picture'] ?? null;
$currentLastLogin   = $_SESSION['last_login'] ?? null;
$currentPage        = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php echo isset($pageTitle) ? h($pageTitle) . ' | ' : ''; ?>Student Management System</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<div class="d-flex app-shell">

  <!-- Sidebar -->
  <nav class="app-sidebar d-flex flex-column p-3">
    <a href="dashboard.php" class="sidebar-brand mb-4">
      <i class="fa-solid fa-graduation-cap me-2"></i>Student MS
    </a>

    <div class="sidebar-user text-center mb-4">
      <?php if ($currentUserPicture && file_exists('assets/uploads/' . $currentUserPicture)): ?>
        <img src="assets/uploads/<?php echo h($currentUserPicture); ?>" class="sidebar-avatar mb-2" alt="<?php echo h($currentUserName); ?>">
      <?php else: ?>
        <div class="sidebar-avatar sidebar-avatar-placeholder mb-2 mx-auto"><i class="fa-solid fa-user"></i></div>
      <?php endif; ?>
      <div class="fw-semibold small"><?php echo h($currentUserName); ?></div>
      <?php if ($currentLastLogin): ?>
        <div class="text-white-50 small">Last login: <?php echo h($currentLastLogin); ?></div>
      <?php endif; ?>
    </div>

    <ul class="nav nav-pills flex-column mb-auto sidebar-nav">
      <li class="nav-item">
        <a href="dashboard.php" class="nav-link <?php echo $currentPage === 'dashboard.php' ? 'active' : ''; ?>">
          <i class="fa-solid fa-gauge me-2"></i>Dashboard
        </a>
      </li>
      <li class="nav-item">
        <a href="index.php" class="nav-link <?php echo $currentPage === 'index.php' ? 'active' : ''; ?>">
          <i class="fa-solid fa-table me-2"></i>Manage Students
        </a>
      </li>
      <li class="nav-item">
        <a href="add_student.php" class="nav-link <?php echo $currentPage === 'add_student.php' ? 'active' : ''; ?>">
          <i class="fa-solid fa-user-plus me-2"></i>Add Student
        </a>
      </li>
      <li class="nav-item">
        <a href="profile.php" class="nav-link <?php echo $currentPage === 'profile.php' ? 'active' : ''; ?>">
          <i class="fa-solid fa-id-badge me-2"></i>My Profile
        </a>
      </li>
      <li class="nav-item">
        <a href="change_password.php" class="nav-link <?php echo $currentPage === 'change_password.php' ? 'active' : ''; ?>">
          <i class="fa-solid fa-key me-2"></i>Change Password
        </a>
      </li>
    </ul>

    <a href="logout.php" class="btn btn-outline-light btn-sm mt-3">
      <i class="fa-solid fa-right-from-bracket me-2"></i>Logout
    </a>
  </nav>

  <!-- Main content -->
  <main class="app-main flex-grow-1 p-4">
