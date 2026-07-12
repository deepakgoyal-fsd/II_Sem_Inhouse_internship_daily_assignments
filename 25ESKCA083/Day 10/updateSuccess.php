<?php
session_start();
if (!isset($_SESSION['user_name'])) {
    header("Location: login.php");
    exit();
}
include("headerfordash.php"); 
?>

<div class="container mt-5" style="max-width: 500px;">
    <div class="card shadow-sm border-0">
        <div class="card-body text-center p-5">
            <div class="mb-4">
                <span class="badge bg-success-subtle text-success p-3 rounded-circle fs-1">✓</span>
            </div>
            
            <h3 class="mb-3 font-weight-bold">Password Updated!</h3>
            <p class="text-muted mb-4">
                Your password has been changed securely, <?php echo htmlspecialchars($_SESSION['user_name']); ?>. 
                The next time you log in, please use your new password.
            </p>

            <a href="dashboard.php" class="btn btn-primary w-100 py-2">Back to Dashboard</a>
        </div>
    </div>
</div>

<?php
include("footer.php");
?>