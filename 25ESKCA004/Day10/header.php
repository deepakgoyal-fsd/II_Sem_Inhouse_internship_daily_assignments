<?php
// Safe to include from any page - won't clash if session already started.
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Website</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600;700&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">

    <style>
        :root {
            --brand: #4338CA;
            --brand-dark: #312E81;
            --accent: #06B6D4;
            --bg: #F8FAFC;
            --text: #1E293B;
        }
        body {
            background-color: var(--bg);
            color: var(--text);
            font-family: 'Inter', sans-serif;
        }
        h1, h2, h3, h4, .brand-font {
            font-family: 'Poppins', sans-serif;
            font-weight: 600;
        }
        .site-header {
            background: linear-gradient(90deg, var(--brand) 0%, var(--brand-dark) 100%);
        }
        .site-header .nav-link, .site-header .navbar-brand {
            color: #E0E7FF !important;
            font-weight: 500;
        }
        .site-header .nav-link:hover {
            color: #ffffff !important;
        }
        .card {
            border: none;
            border-radius: 1rem;
            box-shadow: 0 10px 30px rgba(15, 23, 42, 0.08);
        }
        .btn-primary {
            background-color: var(--brand);
            border-color: var(--brand);
        }
        .btn-primary:hover {
            background-color: var(--brand-dark);
            border-color: var(--brand-dark);
        }
        .sidebar-link {
            display: block;
            padding: .6rem 1rem;
            border-radius: .6rem;
            color: var(--text);
            text-decoration: none;
            margin-bottom: .4rem;
        }
        .sidebar-link:hover, .sidebar-link.active {
            background-color: #EEF2FF;
            color: var(--brand);
        }
    </style>
</head>
<body>
    <header class="site-header">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center py-3">

                <a href="dashboard.php" class="navbar-brand brand-font d-flex align-items-center gap-2">
                    <i class="bi bi-grid-1x2-fill"></i> My Website
                </a>

                <nav>
                    <ul class="nav align-items-center">
                        <li class="nav-item">
                            <a href="dashboard.php" class="nav-link">Home</a>
                        </li>
                    </ul>
                </nav>

                <?php if (isset($_SESSION['user_name'])): ?>
                    <div class="d-flex align-items-center gap-3">
                        <span class="text-white small">
                            Hi, <?php echo htmlspecialchars($_SESSION['user_name']); ?>
                        </span>
                        <a href="logout.php" class="btn btn-light btn-sm">
                            <i class="bi bi-box-arrow-right"></i> Logout
                        </a>
                    </div>
                <?php else: ?>
                    <a href="login.php" class="btn btn-light btn-sm">Login</a>
                <?php endif; ?>

            </div>
        </div>
    </header>