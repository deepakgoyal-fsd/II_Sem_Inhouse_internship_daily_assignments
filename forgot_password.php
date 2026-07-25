<?php
session_start();
require_once 'db.php';

$message = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = htmlspecialchars(trim($_POST['email']));
    $new_password = $_POST['new_password'];

    
    $stmt = $conn->prepare("SELECT id FROM users WHERE email = ? AND role = 'student'");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $user_result = $stmt->get_result();

    if ($user_result->num_rows > 0) {
        $user = $user_result->fetch_assoc();
        $user_id = $user['id'];

      
        $hashed_password = password_hash($new_password, PASSWORD_BCRYPT);
        $update_stmt = $conn->prepare("UPDATE users SET password = ? WHERE id = ?");
        $update_stmt->bind_param("si", $hashed_password, $user_id);
        
        if ($update_stmt->execute()) {
            $message = "Password updated successfully! <a href='login.php' style='color: #38bdf8;'>Login here</a>";
        } else {
            $error = "Something went wrong. Please try again.";
        }
        $update_stmt->close();
    } else {
        $error = "No student found with this email address.";
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password - Nirwana Portal</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .forgot-box {
            background: rgba(255, 255, 255, 0.07);
            backdrop-filter: blur(12px);
            padding: 2.5rem;
            border-radius: 16px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            max-width: 400px;
            margin: 4rem auto;
            color: #fff;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
        }
        .btn-submit {
            background: #10B981;
            color: white;
            border: none;
            padding: 0.75rem;
            border-radius: 8px;
            width: 100%;
            cursor: pointer;
            font-size: 1rem;
            margin-top: 1rem;
            font-weight: 600;
        }
        .btn-submit:hover { background: #059669; transform:translateY(-2px); }
        .alert { padding: 0.75rem; border-radius: 8px; margin-bottom: 1rem; font-size: 0.9rem; text-align: center; font-weight: bold;}
        .alert-error { background: rgba(239, 68, 68, 0.2); border: 1px solid #ef4444; color: #f87171; }
        .alert-success { background: rgba(34, 197, 94, 0.2); border: 1px solid #22c55e; color: #4ade80; }
    </style>
</head>
<body>
    <div class="forgot-box">
        <h2 style="text-align: center; margin-bottom: 1.5rem;">Reset Password</h2>
        
        <?php if($error): ?>
            <div class="alert alert-error"><?php echo $error; ?></div>
        <?php endif; ?>
        
        <?php if($message): ?>
            <div class="alert alert-success"><?php echo $message; ?></div>
        <?php endif; ?>

        <form action="" method="POST">
            <div style="margin-bottom: 1.25rem;">
                <label style="color: #fff;">Registered Email</label>
                <input type="email" name="email" required style="width:100%; padding:0.75rem; border-radius:8px; border:1px solid rgba(255,255,255,0.2); background:rgba(0,0,0,0.2); color:#fff; box-sizing:border-box;">
            </div>

            <div style="margin-bottom: 1.5rem;">
                <label style="color: #fff;">Enter New Password</label>
                <input type="password" name="new_password" required style="width:100%; padding:0.75rem; border-radius:8px; border:1px solid rgba(255,255,255,0.2); background:rgba(0,0,0,0.2); color:#fff; box-sizing:border-box;">
            </div>

            <button type="submit" class="btn-submit">Reset Password</button>
        </form>
        
        <p style="text-align: center; margin-top: 1.5rem; font-size: 0.9rem;">
            <a href="login.php" style="color: #a5b4fc; text-decoration: none; font-weight: 600;">Back to Login</a>
        </p>
    </div>
</body>
</html>
