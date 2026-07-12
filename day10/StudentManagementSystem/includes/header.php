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

<nav class="navbar navbar-dark app-navbar mb-4">
  <div class="container">
    <a class="navbar-brand fw-bold" href="index.php">
      <i class="fa-solid fa-graduation-cap me-2"></i>Student Management System
    </a>
    <a href="add_student.php" class="btn btn-light btn-sm fw-semibold">
      <i class="fa-solid fa-user-plus me-1"></i>Add Student
    </a>
  </div>
</nav>

<main class="container pb-5">
