<?php
session_start();


if (isset($_SESSION['user_role'])) {
    if ($_SESSION['user_role'] === 'student') {
        header("Location: student_dashboard.php");
        exit();
    } else if ($_SESSION['user_role'] === 'admin') {
        header("Location: admin_dashboard.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KBH Portal - Select Your Role</title>
    <!-- FontAwesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
            transition: background-color 0.3s ease, color 0.3s ease, border-color 0.3s ease, box-shadow 0.3s ease;
        }

        /* Base Body Style */
        body {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 2rem 1rem;
            position: relative;
        }

        /* 🌙 Dark Mode Styles */
        body.dark-mode {
            background-color: #0d1322;
            color: #f8fafc;
        }
        body.dark-mode .header-title h1 { color: #ffffff; }
        body.dark-mode .header-title p { color: #94a3b8; }
        body.dark-mode .role-card {
            background: #182235;
            border: 1px solid rgba(255, 255, 255, 0.05);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
        }
        body.dark-mode .role-card:hover {
            border-color: #10B981;
            box-shadow: 0 15px 30px rgba(16, 185, 129, 0.16);
            background: #1E293B;
        }
        body.dark-mode .icon-wrapper { background: rgba(16,185,129,.14); }
        body.dark-mode .icon-wrapper i { color: #10B981; }
        body.dark-mode .role-title { color: #ffffff; }
        body.dark-mode .role-desc { color: #94a3b8; }
        body.dark-mode .role-features li { color: #cbd5e1; }
        body.dark-mode .footer-text { color: #64748b; }

      
        body.light-mode {
            background-color: #f1f5f9;
            color: #1e293b;
        }
        body.light-mode .header-title h1 { color: #0f172a; }
        body.light-mode .header-title p { color: #475569; }
        body.light-mode .role-card {
            background: #ffffff;
            border: 1px solid rgba(0, 0, 0, 0.06);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
        }
        body.light-mode .role-card:hover {
            border-color: #10B981;
            box-shadow: 0 15px 30px rgba(16, 185, 129, 0.15);
            background: #ffffff;
        }
        body.light-mode .icon-wrapper { background: #D1FAE5; }
        body.light-mode .icon-wrapper i { color: #059669; }
        body.light-mode .role-title { color: #0f172a; }
        body.light-mode .role-desc { color: #64748b; }
        body.light-mode .role-features li { color: #334155; }
        body.light-mode .footer-text { color: #64748b; }

       
        .header-title {
            text-align: center;
            margin-bottom: 2.5rem;
        }

        .header-title h1 {
            font-size: 2.2rem;
            font-weight: 800;
            margin-bottom: 0.6rem;
            letter-spacing: -0.5px;
        }

        .header-title p {
            font-size: 1.05rem;
        }

        .roles-container {
            display: flex;
            gap: 2rem;
            max-width: 850px;
            width: 100%;
            justify-content: center;
            flex-wrap: wrap;
            margin-bottom: 3rem;
        }

        .role-card {
            border-radius: 20px;
            padding: 2.5rem 2rem;
            flex: 1;
            min-width: 300px;
            max-width: 380px;
            text-align: center;
            text-decoration: none;
            transition: all 0.3s ease;
            display: flex;
            flex-direction: column;
            align-items: center;
            cursor: pointer;
        }

        .role-card:hover {
            transform: translateY(-6px);
        }

        .icon-wrapper {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 1.5rem;
        }

        .icon-wrapper i {
            font-size: 1.8rem;
        }

        .role-title {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 0.8rem;
        }

        .role-desc {
            font-size: 0.92rem;
            line-height: 1.5;
            margin-bottom: 1.8rem;
        }

        .role-features {
            list-style: none;
            text-align: left;
            width: 100%;
            padding-top: 1rem;
        }

        .role-features li {
            font-size: 0.88rem;
            margin-bottom: 0.6rem;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .role-features li::before {
            content: "•";
            color: #10B981;
            font-weight: bold;
            font-size: 1.2rem;
        }

        .footer-text {
            font-size: 0.9rem;
            text-align: center;
        }

        
        .theme-toggle-btn {
            position: fixed;
            bottom: 25px;
            right: 25px;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            border: none;
            cursor: pointer;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 1.3rem;
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.15);
            transition: transform 0.2s ease, background-color 0.3s ease;
            z-index: 100;
        }

        .theme-toggle-btn:hover {
            transform: scale(1.1);
        }

        body.dark-mode .theme-toggle-btn {
            background-color: #1e293b;
            color: #fbbf24;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        body.light-mode .theme-toggle-btn {
            background-color: #ffffff;
            color: #1e293b;
            border: 1px solid rgba(0, 0, 0, 0.08);
        }

        @media (max-width: 680px) {
            .header-title h1 { font-size: 1.7rem; }
            .roles-container { flex-direction: column; align-items: center; }
            .role-card { width: 100%; }
            .theme-toggle-btn { bottom: 15px; right: 15px; width: 45px; height: 45px; }
        }
    </style>
</head>
<body class="dark-mode" id="bodyNode">

    <div class="header-title">
        <h1>KBH Hostel Portal</h1>
        <p>Select your role to access the examination portal</p>
    </div>

    <div class="roles-container">
        
        <!-- Student Card -->
        <a href="login.php?role=student" class="role-card">
            <div class="icon-wrapper">
                <i class="fa-solid fa-graduation-cap"></i>
            </div>
            <h2 class="role-title">Student</h2>
            <p class="role-desc">Access your room requests, booking status, and fee details</p>
            <ul class="role-features">
                <li>Fill examination forms</li>
                <li>Download admit cards</li>
                <li>View results</li>
            </ul>
        </a>

     
        <a href="login.php?role=admin" class="role-card">
            <div class="icon-wrapper">
                <i class="fa-solid fa-building-columns"></i>
            </div>
            <h2 class="role-title">College</h2>
            <p class="role-desc">Administrative access to manage students and examinations</p>
            <ul class="role-features">
                <li>Manage student data</li>
                <li>Control admit cards</li>
                <li>Publish results</li>
            </ul>
        </a>

    </div>

    <p class="footer-text">Need help? Contact your institution's examination department</p>

  
    <button class="theme-toggle-btn" id="themeBtn" onclick="toggleTheme()" title="Toggle Light/Dark Mode">
        <i class="fa-solid fa-sun" id="themeIcon"></i>
    </button>

    <script>
        function toggleTheme() {
            var body = document.getElementById("bodyNode");
            var icon = document.getElementById("themeIcon");

            if (body.classList.contains("dark-mode")) {
                body.classList.replace("dark-mode", "light-mode");
                icon.classList.replace("fa-sun", "fa-moon");
                localStorage.setItem("portal_theme", "light");
            } else {
                body.classList.replace("light-mode", "dark-mode");
                icon.classList.replace("fa-moon", "fa-sun");
                localStorage.setItem("portal_theme", "dark");
            }
        }

        
        window.onload = function() {
            var savedTheme = localStorage.getItem("portal_theme");
            var body = document.getElementById("bodyNode");
            var icon = document.getElementById("themeIcon");

            if (savedTheme === "light") {
                body.classList.replace("dark-mode", "light-mode");
                icon.classList.replace("fa-sun", "fa-moon");
            }
        };
    </script>

</body>
</html>
