<?php
session_start();
if (isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}
include 'db_connect.php';

$error = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = mysqli_real_escape_string($conn, trim($_POST['email'] ?? ''));
    $password = $_POST['password'] ?? '';

    if (empty($email) || empty($password)) {
        $error = "Invalid Credentials";
    } else {
        $sql = "SELECT * FROM users WHERE email = '$email' LIMIT 1";
        $result = mysqli_query($conn, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            $user = mysqli_fetch_assoc($result);
            if ($user['password'] === $password) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_name'] = $user['name'];
                $_SESSION['user_email'] = $user['email'];
                $_SESSION['user_photo'] = $user['profile_pic'];
                $_SESSION['login_time'] = date('M j, Y \a\t g:i A');

                $now = date('Y-m-d H:i:s');
                mysqli_query($conn, "UPDATE users SET last_login = '$now' WHERE id = " . $user['id']);

                header("Location: index.php");
                exit();
            } else {
                $error = "Invalid Credentials";
            }
        } else {
            $error = "Invalid Credentials";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Secure Portal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body class="d-flex align-items-center justify-content-center min-vh-100 login-bg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5 col-lg-4">
                <div class="glass-card overflow-hidden shadow-lg border-0 bg-white">
                    <div class="bg-primary text-white text-center py-4">
                        <i class="fas fa-lock fa-3x mb-2"></i>
                        <h3 class="mb-0 fw-bold">Secure Login</h3>
                    </div>
                    <div class="p-4 p-md-5">
                        <?php if ($error): ?>
                            <div class="alert alert-danger shadow-sm border-0 d-flex align-items-center">
                                <i class="fas fa-exclamation-circle me-2 text-danger"></i> <?= htmlspecialchars($error) ?>
                            </div>
                        <?php endif; ?>
                        <form method="POST" action="login.php">
                            <div class="mb-3">
                                <label class="form-label text-muted fw-bold small">Email Address</label>
                                <div class="input-group shadow-sm">
                                    <span class="input-group-text bg-light border-end-0"><i class="fas fa-envelope text-muted"></i></span>
                                    <input type="email" name="email" class="form-control border-start-0" placeholder="admin@example.com" required>
                                </div>
                            </div>
                            <div class="mb-4">
                                <label class="form-label text-muted fw-bold small d-flex justify-content-between">
                                    Password
                                    <a href="forgot_password.php" class="text-decoration-none small text-primary">Forgot?</a>
                                </label>
                                <div class="input-group shadow-sm">
                                    <span class="input-group-text bg-light border-end-0"><i class="fas fa-key text-muted"></i></span>
                                    <input type="password" name="password" id="passInput" class="form-control border-start-0 border-end-0" placeholder="••••••••" required>
                                    <button class="btn btn-light border border-start-0" type="button" onclick="togglePass()"><i class="fas fa-eye text-muted" id="passIcon"></i></button>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary w-100 py-2 fs-5 shadow fw-bold"><i class="fas fa-sign-in-alt me-2"></i> Login to Portal</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function togglePass() {
            let input = document.getElementById('passInput');
            let icon = document.getElementById('passIcon');
            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.replace('fa-eye', 'fa-eye-slash');
            } else {
                input.type = 'password';
                icon.classList.replace('fa-eye-slash', 'fa-eye');
            }
        }
    </script>
</body>

</html>