<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background: linear-gradient(135deg, #1e293b 0%, #0f172a 100%);
            min-height: 100vh;
        }

        .glass-card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>

<body class="d-flex align-items-center justify-content-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="glass-card overflow-hidden">
                    <div class="bg-primary text-white text-center py-4">
                        <i class="fas fa-envelope-open-text fa-3x mb-2"></i>
                        <h3 class="mb-0 fw-bold">Reset Password</h3>
                    </div>
                    <div class="p-4 p-md-5">
                        <?php if ($_SERVER['REQUEST_METHOD'] == 'POST'): ?>
                            <div class="alert alert-success shadow-sm">
                                <i class="fas fa-check-circle me-2"></i> If the email exists, a reset link has been sent.
                            </div>
                            <a href="login.php" class="btn btn-primary w-100 fw-bold">Return to Login</a>
                        <?php else: ?>
                            <p class="text-muted text-center mb-4">Enter your registered email address and we'll send you instructions to reset your password.</p>
                            <form method="POST">
                                <div class="mb-4">
                                    <label class="form-label text-muted fw-bold small">Email Address</label>
                                    <div class="input-group shadow-sm">
                                        <span class="input-group-text bg-light border-end-0"><i class="fas fa-envelope text-muted"></i></span>
                                        <input type="email" name="email" class="form-control border-start-0" placeholder="admin@example.com" required>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary w-100 py-2 fs-5 fw-bold shadow">Send Reset Link</button>
                                <div class="text-center mt-3">
                                    <a href="login.php" class="text-decoration-none text-muted"><i class="fas fa-arrow-left me-1"></i> Back to Login</a>
                                </div>
                            </form>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>