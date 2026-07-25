<?php
include('db.php');
session_start();

$message = ""; 
$error = "";
$submitted_role = isset($_POST['role']) ? $_POST['role'] : 'student';

if (isset($_SESSION['user_role'])) {
    if ($_SESSION['user_role'] === 'student') {
        header("Location: student_dashboard.php");
        exit();
    } else if ($_SESSION['user_role'] === 'admin') {
        header("Location: admin_dashboard.php");
        exit();
    }
}


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['signup'])) {
    $name = htmlspecialchars(trim($_POST['name']));
    $email = filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL);
    $password = trim($_POST['password']);
    $role = 'student';

    if (!$email || strlen($name) < 2 || strlen($password) < 8) {
        $error = "Enter a valid email, name, and a password of at least 8 characters.";
    } else {
    $check_stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $check_stmt->bind_param("s", $email);
    $check_stmt->execute();
    if ($check_stmt->get_result()->num_rows > 0) {
        $error = "Email already registered! Please Sign In.";
        $submitted_role = 'student';
    } else {
        $hashed_pwd = password_hash($password, PASSWORD_DEFAULT);
        $ins_stmt = $conn->prepare("INSERT INTO users (name, email, password, role) VALUES (?, ?, ?, ?)");
        $ins_stmt->bind_param("ssss", $name, $email, $hashed_pwd, $role);
        if ($ins_stmt->execute()) {
            $message = "Registration successful! You can now Sign In.";
        } else {
            $error = "Registration failed! Please try again.";
        }
        $ins_stmt->close();
        $submitted_role = 'student';
    }
    $check_stmt->close();
    }
}


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    $email = filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL);
    $password = trim($_POST['password']);
    $selected_role = htmlspecialchars($_POST['role']);
    $submitted_role = $selected_role;

    
    if (!$email) {
        $error = "Please enter a valid email address.";
    } elseif ($selected_role === 'admin') {
        $FIXED_ADMIN_EMAIL = "admin@hostel.com";
        $FIXED_ADMIN_PASS  = "admin123";

        if ($email === $FIXED_ADMIN_EMAIL && $password === $FIXED_ADMIN_PASS) {
            $_SESSION['user_id'] = 999;
            $_SESSION['user_name'] = "Hostel Admin";
            $_SESSION['user_role'] = "admin";

            header("Location: admin_dashboard.php");
            exit();
        } else {
            $error = "Invalid Admin ID or Password!";
        }
    } 
    
    else {
        $stmt = $conn->prepare("SELECT * FROM users WHERE email = ? AND role = 'student'");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $user = $result->fetch_assoc();
            if (password_verify($password, $user['password']) || $password === $user['password']) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_name'] = $user['name'];
                $_SESSION['user_role'] = 'student';

                header("Location: student_dashboard.php");
                exit();
            } else {
                $error = "Incorrect Password!";
            }
        } else {
            $error = "No Student account found with email '$email'!";
        }
        $stmt->close();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KBH Portal - Select Role & Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
            transition: background-color 0.4s ease, color 0.3s ease, border-color 0.3s ease, box-shadow 0.3s ease;
        }

        
        body {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 2rem 1rem;
            position: relative;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }

      
        body.dark-mode {
            background-image: linear-gradient(rgba(13, 19, 34, 0.55), rgba(13, 19, 34, 0.55)), url('images/hostel.jpg');
            color: #f8fafc;
        }
        body.dark-mode .header-title h1 { color: #ffffff; }
        body.dark-mode .header-title p { color: #94a3b8; }
        body.dark-mode .role-card {
            background: rgba(24, 34, 53, 0.75);
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
        }
        body.dark-mode .role-card:hover { border-color: #6366f1; background: rgba(30, 42, 66, 0.88); }
        body.dark-mode .icon-wrapper { background: rgba(99, 102, 241, 0.2); color: #818cf8; }
        body.dark-mode .form-container { 
            background: rgba(24, 34, 53, 0.82); 
            border: 1px solid rgba(255, 255, 255, 0.1); 
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
        }
        body.dark-mode .input-group input { background: rgba(15, 23, 42, 0.7); color: #ffffff; border: 1px solid rgba(255, 255, 255, 0.15); }
        body.dark-mode .input-group input:focus { border-color: #6366f1; }
        body.dark-mode .tab-btn { color: #94a3b8; }
        body.dark-mode .tab-btn.active { color: #6366f1; border-bottom-color: #6366f1; }
        body.dark-mode .back-btn { color: #94a3b8; }
        body.dark-mode .back-btn:hover { color: #ffffff; }

       
        body.light-mode {
            background-image: linear-gradient(rgba(241, 245, 249, 0.32), rgba(241, 245, 249, 0.32)), url('images/hostel.jpg');
            color: #1e293b;
        }
        body.light-mode .header-title h1 { color: #0f172a; }
        body.light-mode .header-title p { color: #475569; }
        body.light-mode .role-card {
            background: rgba(255, 255, 255, 0.85);
            border: 1px solid rgba(0, 0, 0, 0.08);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.08);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
        }
        body.light-mode .role-card:hover { border-color: #6366f1; background: rgba(255, 255, 255, 0.95); }
        body.light-mode .icon-wrapper { background: rgba(99, 102, 241, 0.12); color: #4f46e5; }
        body.light-mode .form-container { 
            background: rgba(255, 255, 255, 0.88); 
            border: 1px solid rgba(0, 0, 0, 0.08); 
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
        }
        body.light-mode .input-group input { background: rgba(255, 255, 255, 0.8); color: #0f172a; border: 1px solid rgba(0, 0, 0, 0.15); }
        body.light-mode .input-group input:focus { border-color: #6366f1; background: #ffffff; }
        body.light-mode .tab-btn { color: #64748b; }
        body.light-mode .tab-btn.active { color: #6366f1; border-bottom-color: #6366f1; }
        body.light-mode .back-btn { color: #64748b; }
        body.light-mode .back-btn:hover { color: #0f172a; }

        .header-title { text-align: center; margin-bottom: 2rem; }
        .header-title h1 { font-size: 2.2rem; font-weight: 800; margin-bottom: 0.5rem; }

        .roles-container {
            display: flex; gap: 1.5rem; max-width: 750px; width: 100%; justify-content: center; margin-bottom: 2rem;
        }

        .role-card {
            border-radius: 20px; padding: 1.8rem; flex: 1; text-align: center; cursor: pointer;
            display: flex; flex-direction: column; align-items: center; transition: all 0.3s ease;
        }
        .role-card:hover { transform: translateY(-4px); }

        .icon-wrapper {
            width: 60px; height: 60px; border-radius: 50%; display: flex; justify-content: center;
            align-items: center; margin-bottom: 1rem; font-size: 1.5rem;
        }

        .role-title { font-size: 1.3rem; font-weight: 700; margin-bottom: 0.5rem; }
        .role-desc { font-size: 0.85rem; opacity: 0.8; margin-bottom: 1rem; }
        .role-features { list-style: none; text-align: left; width: 100%; font-size: 0.8rem; opacity: 0.9; }
        .role-features li { margin-bottom: 0.4rem; }
        .role-features li::before { content: "• "; color: #6366f1; font-weight: bold; }

        .form-container {
            max-width: 420px; width: 100%; border-radius: 20px; padding: 2rem;
            display: none; animation: fadeIn 0.4s ease;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .back-btn {
            background: none; border: none; font-size: 0.85rem; font-weight: 600; cursor: pointer;
            display: flex; align-items: center; gap: 6px; margin-bottom: 1.2rem;
        }

        .tabs-header {
            display: flex; border-bottom: 2px solid rgba(148, 163, 184, 0.2); margin-bottom: 1.5rem;
        }

        .tab-btn {
            flex: 1; background: none; border: none; padding: 0.8rem; font-size: 0.95rem; font-weight: 700;
            cursor: pointer; border-bottom: 3px solid transparent; margin-bottom: -2px;
        }

        .input-group { margin-bottom: 1.2rem; text-align: left; }
        .input-group label { display: block; margin-bottom: 0.5rem; font-size: 0.88rem; font-weight: 600; }
        .input-group input { width: 100%; padding: 0.8rem 1rem; border-radius: 12px; font-size: 0.95rem; outline: none; }

        .btn-submit {
            width: 100%; background: linear-gradient(135deg, #6366f1 0%, #4f46e5 100%); color: white;
            border: none; padding: 0.85rem; border-radius: 12px; font-weight: 700; font-size: 1rem;
            cursor: pointer; box-shadow: 0 4px 15px rgba(99, 102, 241, 0.3); margin-top: 0.5rem;
        }

        .btn-submit:hover { opacity: 0.95; transform: translateY(-1px); }

        .theme-toggle-btn {
            position: fixed; bottom: 20px; right: 20px; width: 45px; height: 45px; border-radius: 50%;
            border: none; cursor: pointer; display: flex; justify-content: center; align-items: center;
            font-size: 1.2rem; box-shadow: 0 6px 16px rgba(0,0,0,0.2); transition: transform 0.2s;
            z-index: 100;
        }
        .theme-toggle-btn:hover { transform: scale(1.1); }

        body.dark-mode .theme-toggle-btn { background: #1e293b; color: #fbbf24; border: 1px solid rgba(255,255,255,0.1); }
        body.light-mode .theme-toggle-btn { background: #ffffff; color: #1e293b; border: 1px solid rgba(0,0,0,0.1); }
    </style>
</head>
<body class="dark-mode" id="bodyNode">

    <div class="header-title" id="headerTitle">
        <h1>KBH Portal</h1>
        <p>Select your role to access the portal</p>
    </div>

  
    <div class="roles-container" id="rolesContainer">
        <!-- Student Card -->
        <div class="role-card" id="studentCard" onclick="selectRole('student')">
            <div class="icon-wrapper">
                <i class="fa-solid fa-graduation-cap"></i>
            </div>
            <h2 class="role-title">Student</h2>
            <p class="role-desc">Access room requests and allocation portal</p>
            <ul class="role-features">
                <li>Lock room requests</li>
                <li>View status & receipts</li>
            </ul>
        </div>

        
        <div class="role-card" id="adminCard" onclick="selectRole('admin')">
            <div class="icon-wrapper">
                <i class="fa-solid fa-user-shield"></i>
            </div>
            <h2 class="role-title">Hostel Admin</h2>
            <p class="role-desc">Administrative control over rooms and students</p>
            <ul class="role-features">
                <li>Manage student records</li>
                <li>Control bed availability</li>
            </ul>
        </div>
    </div>

    <div class="form-container" id="formContainer">
        
        <button type="button" class="back-btn" onclick="goBackToRoles()">
            <i class="fa-solid fa-arrow-left"></i> Change Role
        </button>

      
        <?php if($message): ?>
            <p style="color: #10b981; font-size: 0.9rem; margin-bottom: 1rem; text-align: center; font-weight: 600;"><?php echo $message; ?></p>
        <?php endif; ?>
        <?php if($error): ?>
            <p style="color: #ef4444; font-size: 0.9rem; margin-bottom: 1rem; text-align: center; font-weight: 600;"><?php echo $error; ?></p>
        <?php endif; ?>

      
        <div class="tabs-header" id="studentTabs">
            <button class="tab-btn active" id="signinTabBtn" onclick="switchTab('signin')">Sign In</button>
            <button class="tab-btn" id="signupTabBtn" onclick="switchTab('signup')">Sign Up (New)</button>
        </div>

        
        <h3 id="adminTitle" style="display: none; margin-bottom: 1.2rem; font-size: 1.2rem; text-align: center;">Hostel Admin Sign In</h3>

        
        <form method="POST" action="login.php" id="signinForm">
            <input type="hidden" name="role" id="roleInput" value="student">

            <div class="input-group">
                <label>Email Address</label>
                <input type="email" name="email" required placeholder="name@example.com">
            </div>

            <div class="input-group">
                <label>Password</label>
                <input type="password" name="password" required placeholder="••••••••">
            </div>

            <button type="submit" name="login" class="btn-submit" id="submitBtn">Sign In as Student</button>
        </form>

        
        <form method="POST" action="login.php" id="signupForm" style="display: none;">
            <div class="input-group">
                <label>Full Name</label>
                <input type="text" name="name" required placeholder="Enter your full name">
            </div>

            <div class="input-group">
                <label>Email Address</label>
                <input type="email" name="email" required placeholder="name@example.com">
            </div>

            <div class="input-group">
                <label>Create Password</label>
                <input type="password" name="password" required placeholder="••••••••">
            </div>

            <button type="submit" name="signup" class="btn-submit" style="background: linear-gradient(135deg, #10b981 0%, #059669 100%);">Create Account</button>
        </form>
    </div>

    <button class="theme-toggle-btn" onclick="toggleTheme()" title="Toggle Light/Dark Mode">
        <i class="fa-solid fa-sun" id="themeIcon"></i>
    </button>

    <script>
        function selectRole(role) {
            document.getElementById('roleInput').value = role;
            
            var rolesContainer = document.getElementById('rolesContainer');
            var formContainer = document.getElementById('formContainer');
            var studentTabs = document.getElementById('studentTabs');
            var adminTitle = document.getElementById('adminTitle');
            var submitBtn = document.getElementById('submitBtn');

            rolesContainer.style.display = "none";
            formContainer.style.display = "block";

            if (role === 'student') {
                studentTabs.style.display = "flex";
                adminTitle.style.display = "none";
                submitBtn.innerText = "Sign In as Student";
                switchTab('signin');
            } else {
                studentTabs.style.display = "none";
                adminTitle.style.display = "block";
                
                document.getElementById('signinForm').style.display = "block";
                document.getElementById('signupForm').style.display = "none";
                submitBtn.innerText = "Sign In as Admin";
            }
        }

        function goBackToRoles() {
            document.getElementById('rolesContainer').style.display = "flex";
            document.getElementById('formContainer').style.display = "none";
        }

        function switchTab(tab) {
            var signinForm = document.getElementById('signinForm');
            var signupForm = document.getElementById('signupForm');
            var signinTabBtn = document.getElementById('signinTabBtn');
            var signupTabBtn = document.getElementById('signupTabBtn');

            if (tab === 'signin') {
                signinForm.style.display = "block";
                signupForm.style.display = "none";
                signinTabBtn.classList.add('active');
                signupTabBtn.classList.remove('active');
            } else {
                signinForm.style.display = "none";
                signupForm.style.display = "block";
                signupTabBtn.classList.add('active');
                signinTabBtn.classList.remove('active');
            }
        }

        function toggleTheme() {
            var body = document.getElementById("bodyNode");
            var icon = document.getElementById("themeIcon");

            if (body.classList.contains("dark-mode")) {
                body.classList.replace("dark-mode", "light-mode");
                icon.classList.replace("fa-sun", "fa-moon");
                localStorage.setItem("kbh_theme", "light");
            } else {
                body.classList.replace("light-mode", "dark-mode");
                icon.classList.replace("fa-moon", "fa-sun");
                localStorage.setItem("kbh_theme", "dark");
            }
        }

        // Auto remember light/dark choice
        window.onload = function() {
            var savedTheme = localStorage.getItem("kbh_theme");
            var body = document.getElementById("bodyNode");
            var icon = document.getElementById("themeIcon");

            if (savedTheme === "light") {
                body.classList.replace("dark-mode", "light-mode");
                icon.classList.replace("fa-sun", "fa-moon");
            }
        };

        // Restore correct form view after post submit
        <?php if($error || $message): ?>
            selectRole('<?php echo $submitted_role; ?>');
        <?php endif; ?>
    </script>
</body>
</html>
