<?php
session_start(); // This MUST be the very first line of the file
include 'db_connect.php';

// If already logged in, skip the login page
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
    header("Location: index.php");
    exit;
}

$error = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    // Hardcoded credentials for college project demo
    if ($user === 'kunal' && $pass === '12345') {
        $_SESSION['logged_in'] = true;
        header("Location: index.php");
        exit;
    } else {
        $error = "Invalid username or password!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { background-color: #f0f4f8; font-family: 'Inter', sans-serif; }
        .login-card { border: none; border-radius: 16px; box-shadow: 0 10px 25px rgba(0,0,0,0.08); }
        .form-control { border-radius: 8px; padding: 10px 15px; }
        .btn-primary { border-radius: 8px; padding: 10px; font-weight: 600; background: #3b82f6; border: none; }
        .btn-primary:hover { background: #2563eb; transform: translateY(-2px); box-shadow: 0 4px 12px rgba(59, 130, 246, 0.4); }
    </style>
</head>
<body class="d-flex align-items-center justify-content-center" style="height: 100vh;">

<div class="card p-4 login-card" style="width: 360px;">
    <h3 class="text-center mb-4 fw-bold" style="color: #0f172a;">Admin Login</h3>
    
    <?php if($error): ?>
        <div class="alert alert-danger py-2 text-center" style="border-radius: 8px;"><?php echo $error; ?></div>
    <?php endif; ?>
    
    <form method="POST" action="">
        <div class="mb-3">
            <label class="form-label text-muted fw-bold" style="font-size: 13px; text-transform: uppercase;">Username</label>
            <input type="text" name="username" class="form-control" required>
        </div>
        <div class="mb-4">
            <label class="form-label text-muted fw-bold" style="font-size: 13px; text-transform: uppercase;">Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary w-100">Login to Dashboard</button>
    </form>
</div>

</body>
</html>