<?php
session_start();

if (isset($_SESSION['authenticated']) && $_SESSION['authenticated'] === true) {
    header("Location: dashboard.php");
    exit();
}

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $password = isset($_POST['password']) ? trim($_POST['password']) : '';

    if ($email === "admin@campus.com" && $password === "secret123") {
        $_SESSION['authenticated'] = true;
        $_SESSION['user_name'] = "Administrator";
        $_SESSION['user_email'] = $email;
        $_SESSION['login_time'] = date("H:i:s");
        
        header("Location: dashboard.php");
        exit();
    } else {
        $error = "Invalid email identity or access password credential.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Campus Management - Sign In</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="card p-4 shadow-lg border-0 w-100 style-card" style="max-width: 420px;">
            <div class="text-center mb-4">
                <span class="fs-1">🔓</span>
                <h2 class="fw-bold mt-2 text-info">System Sign In</h2>
                <p class="text-muted small">Access protected administration panel</p>
            </div>

            <?php if (!empty($error)): ?>
                <div class="alert alert-danger border-0 small py-2 text-center" role="alert">
                    <?php echo htmlspecialchars($error); ?>
                </div>
            <?php endif; ?>

            <form action="login.php" method="POST" id="loginForm">
                <div class="mb-3">
                    <label for="email" class="form-label text-uppercase text-muted small fw-bold">Email Address</label>
                    <input type="email" class="form-control bg-dark text-white border-secondary" id="email" name="email" placeholder="admin@campus.com" required>
                </div>
                
                <div class="mb-4">
                    <label for="password" class="form-label text-uppercase text-muted small fw-bold">Security Password</label>
                    <input type="password" class="form-control bg-dark text-white border-secondary" id="password" name="password" placeholder="••••••••" required>
                </div>

                <button type="submit" class="btn btn-info w-100 fw-bold text-dark py-2 mb-2">Authenticate Identity</button>
            </form>
            
            <div class="text-center mt-3">
                <small class="text-muted">Demo Access: <strong>admin@campus.com</strong> / <strong>secret123</strong></small>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            const emailInput = document.getElementById('email').value.trim();
            if(!emailInput.includes('@')) {
                e.preventDefault();
                alert('Please enter a valid format email address.');
            }
        });
    </script>
</body>
</html>