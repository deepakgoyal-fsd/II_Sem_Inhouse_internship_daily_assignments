<?php
session_start();

if (!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] !== true) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Protected Core Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <nav class="navbar navbar-dark bg-secondary px-4 shadow-sm border-bottom border-dark">
        <div class="container-fluid">
            <span class="navbar-brand mb-0 h1 fw-bold text-info d-flex align-items-center gap-2">
                <span>🏫</span> Campus Portal Dashboard
            </span>
            <a href="logout.php" class="btn btn-danger btn-sm fw-bold px-3 d-flex align-items-center gap-1">
                <span>🛑</span> Sign Out
            </a>
        </div>
    </nav>

    <main class="container py-5">
        <div class="row g-4 mb-4">
            <div class="col-12">
                <div class="card p-4 border-0 shadow style-card">
                    <h2 class="fw-bold text-white mb-1">Welcome back, <?php echo htmlspecialchars($_SESSION['user_name']); ?>! 👋</h2>
                    <p class="text-muted m-0">Session verified successfully. All core tracking systems operational.</p>
                </div>
            </div>
        </div>

        <div class="row g-4">
            <div class="col-md-4">
                <div class="card p-4 border-0 shadow text-center h-100 style-card">
                    <span class="fs-1">👤</span>
                    <h5 class="text-uppercase text-muted small fw-bold mt-3 mb-1">Authenticated Account</h5>
                    <div class="fs-5 fw-bold text-white"><?php echo htmlspecialchars($_SESSION['user_email']); ?></div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card p-4 border-0 shadow text-center h-100 style-card">
                    <span class="fs-1">⏱️</span>
                    <h5 class="text-uppercase text-muted small fw-bold mt-3 mb-1">Session Ingress Timestamp</h5>
                    <div class="fs-5 fw-bold text-info"><?php echo htmlspecialchars($_SESSION['SESSION_START_TIME'] ?? $_SESSION['login_time']); ?></div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card p-4 border-0 shadow text-center h-100 style-card">
                    <span class="fs-1">🔒</span>
                    <h5 class="text-uppercase text-muted small fw-bold mt-3 mb-1">System Integrity Status</h5>
                    <div class="fs-5 fw-bold text-success">Active & Encrypted</div>
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-12">
                <div class="card p-4 border-0 shadow style-card">
                    <h4 class="fw-bold text-info mb-3">Admin Data Workspace</h4>
                    <div class="table-responsive">
                        <table class="table table-dark table-hover border border-secondary rounded overflow-hidden">
                            <thead>
                                <tr>
                                    <th>Metric Category</th>
                                    <th>Description Identifier</th>
                                    <th>Status Value</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Global Records Access</td>
                                    <td>Active Directory Query Limit</td>
                                    <td><span class="badge bg-success">Unrestricted</span></td>
                                </tr>
                                <tr>
                                    <td>Database Nodes</td>
                                    <td>Main phpMyAdmin Interface State</td>
                                    <td><span class="badge bg-info">Connected</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>