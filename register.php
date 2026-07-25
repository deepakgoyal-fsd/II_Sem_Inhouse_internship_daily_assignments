<?php
include('db.php');
session_start();
$message = "";
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars(trim($_POST['name']));
    $email = filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'] ?? '';

    if (!$email) {
        $error = "Please enter a valid email address.";
    } elseif (strlen($password) < 8) {
        $error = "Password must be at least 8 characters long.";
    } elseif ($password !== $confirm_password) {
        $error = "Passwords do not match.";
    } else {
    $check_stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $check_stmt->bind_param("s", $email);
    $check_stmt->execute();
    $check_result = $check_stmt->get_result();

    if ($check_result->num_rows > 0) {
        $error = "This email address is already registered.";
        $check_stmt->close();
    } else {
        $check_stmt->close();
        
        
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);
        $default_role = 'student';

        
        $ins_stmt = $conn->prepare("INSERT INTO users (name, email, password, role) VALUES (?, ?, ?, ?)");
        $ins_stmt->bind_param("ssss", $name, $email, $hashed_password, $default_role);
        
        if ($ins_stmt->execute()) {
            $message = "Account created successfully! Redirecting to login...";
            echo "<script>setTimeout(function(){ window.location.href = 'login.php'; }, 2000);</script>";
        } else {
            $error = "Registration failed. Internal server error.";
        }
        $ins_stmt->close();
    }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KBH Portal - Create Account</title>
    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', system-ui, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
            box-sizing: border-box;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            transition: all 0.4s ease;
        }

        
        body.dark-mode {
            background-image: linear-gradient(rgba(15, 23, 42, 0.15), rgba(15, 23, 42, 0.15)), url('images/hostel.jpg');
        }
        body.dark-mode .register-card {
            background: rgba(30, 41, 59, 0.55); 
            border-color: rgba(255, 255, 255, 0.08);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
            color: white;
        }
        body.dark-mode .form-group label { color: #cbd5e1; }
        body.dark-mode .form-group input { background: rgba(0, 0, 0, 0.3); color: white; border-color: rgba(255, 255, 255, 0.12); }
        body.dark-mode .form-group input:focus { background: rgba(0, 0, 0, 0.5); border-color: #10B981; box-shadow:0 0 0 3px rgba(16,185,129,.16); }
        body.dark-mode .eye-icon { color: #cbd5e1; }
        body.dark-mode .links-area { color: #94a3b8; }
        body.dark-mode .links-area a { color: #34D399; }

        
        body.light-mode {
            background-image: linear-gradient(rgba(241, 245, 249, 0.15), rgba(241, 245, 249, 0.15)), url('images/hostel.jpg');
        }
        body.light-mode .register-card {
            background: rgba(255, 255, 255, 0.6); 
            color: #1e293b;
            border-color: rgba(255, 255, 255, 0.6);
            box-shadow: 0 25px 50px -12px rgba(15, 23, 42, 0.12);
        }
        body.light-mode .form-group label { color: #475569; }
        body.light-mode .form-group input { background: rgba(255, 255, 255, 0.7); color: #0f172a; border-color: rgba(0, 0, 0, 0.15); }
        body.light-mode .form-group input:focus { background: white; border-color: #10B981; box-shadow:0 0 0 3px rgba(16,185,129,.14); }
        body.light-mode .eye-icon { color: #475569; }
        body.light-mode .links-area { color: #64748b; }
        body.light-mode .links-area a { color: #059669; }
        body.light-mode .header-section p { color: #475569; }

        
        .theme-toggle {
            position: absolute;
            top: 20px; right: 20px;
            background: #10B981;
            color: white; border: none;
            padding: 10px 18px;
            border-radius: 30px;
            font-weight: bold;
            cursor: pointer;
            box-shadow: 0 4px 14px rgba(16,185,129,0.28);
            z-index: 50;
        }

        .register-card {
            position: relative;
            z-index: 10;
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            padding: 2.5rem;
            border-radius: 26px;
            width: 100%;
            max-width: 420px;
            border: 1px solid;
            box-sizing: border-box;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .header-section { text-align: center; margin-bottom: 1.8rem; }
        .header-section h2 { margin: 0; font-size: 2.2rem; font-weight: 800; color:#34D399; }
        .header-section p { font-size: 0.9rem; color: #94a3b8; margin-top: 6px; }

        .form-group { margin-bottom: 1.2rem; }
        .form-group label { display: block; margin-bottom: 0.5rem; font-size: 0.85rem; font-weight: 600; }
        .form-group input { width: 100%; padding: 0.8rem 1rem; border-radius: 14px; border: 1px solid; box-sizing: border-box; font-size: 0.95rem; transition: all 0.3s ease; }
        .password-wrapper { position: relative; }
        .eye-icon { position: absolute; right: 1rem; top: 50%; transform: translateY(-50%); cursor: pointer; user-select: none; font-size: 1rem; z-index: 5; }
        
        .btn-signup { width: 100%; background: #10B981; color: #06281F; border: none; padding: 0.9rem; border-radius: 14px; font-weight: 700; cursor: pointer; font-size: 1rem; transition: 0.2s; margin-top: 0.8rem; box-shadow: 0 4px 14px rgba(16, 185, 129, 0.26); }
        .btn-signup:hover { background:#059669; color:#fff; transform: translateY(-2px); box-shadow: 0 6px 20px rgba(16, 185, 129, 0.34); }
        
        .links-area { text-align: center; margin-top: 1.5rem; font-size: 0.95rem; position: relative; z-index: 15; }
        .links-area a { text-decoration: none; font-weight: 700; }
        .links-area a:hover { text-decoration: underline; }
    </style>
</head>
<body class="dark-mode" id="bodyNode">

    <button class="theme-toggle" onclick="toggleTheme()" id="themeBtn">☀️ Light Mode</button>

    <div class="register-card">
        <div class="header-section">
            <h2>Create Account</h2>
            <p>Join Keshvanand Boys Hostel Portal</p>
        </div>
        
        <?php if($error) echo "<p style='color:#f87171; text-align:center; font-size:0.9rem; font-weight:600;'>$error</p>"; ?>
        <?php if($message) echo "<p style='color:#34d399; text-align:center; font-size:0.9rem; font-weight:600;'>$message</p>"; ?>
        
        <form method="POST">
            <div class="form-group">
                <label>Full Name</label>
                <input type="text" name="name" required placeholder="John Doe" autocomplete="off">
            </div>
            <div class="form-group">
                <label>Email Address</label>
                <input type="email" name="email" required placeholder="name@example.com" autocomplete="off">
            </div>
            <div class="form-group">
                <label>Create Password</label>
                <div class="password-wrapper">
                    <input type="password" name="password" id="passwordField" required placeholder="••••••••" autocomplete="new-password">
                    <span class="eye-icon" onclick="togglePassword('passwordField', this)">👁️</span>
                </div>
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <div class="password-wrapper">
                    <input type="password" name="confirm_password" id="confirmPasswordField" required placeholder="••••••••" autocomplete="new-password">
                    <span class="eye-icon" onclick="togglePassword('confirmPasswordField', this)">👁️</span>
                </div>
            </div>
            <button type="submit" class="btn-signup">Register Now</button>
        </form>
        
        <div class="links-area">
            Already registered? <a href="login.php">Sign In</a>
        </div>
    </div>

    <script>
        function togglePassword(fieldId, icon) {
            var input = document.getElementById(fieldId);
            if (input.type === 'password') {
                input.type = 'text';
                icon.textContent = '🙈';
            } else {
                input.type = 'password';
                icon.textContent = '👁️';
            }
        }

        function toggleTheme() {
            var body = document.getElementById("bodyNode");
            var btn = document.getElementById("themeBtn");
            if(body.classList.contains("dark-mode")) {
                body.classList.replace("dark-mode", "light-mode");
                btn.innerText = "🌙 Dark Mode";
            } else {
                body.classList.replace("light-mode", "dark-mode");
                btn.innerText = "☀️ Light Mode";
            }
        }
    </script>
</body>
</html>
