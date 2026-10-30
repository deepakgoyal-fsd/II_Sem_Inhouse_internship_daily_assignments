<?php
include 'auth.php';
$page = 'profile';
include 'header.php';
include 'db_connect.php';

$msg = '';
$err = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $current = $_POST['current'] ?? '';
    $new = $_POST['new'] ?? '';
    $confirm = $_POST['confirm'] ?? '';

    $id = $_SESSION['user_id'];
    $res = mysqli_query($conn, "SELECT password FROM users WHERE id=$id");
    $user = mysqli_fetch_assoc($res);

    if ($user['password'] !== $current) {
        $err = "Current password is incorrect.";
    } elseif (strlen($new) < 6) {
        $err = "New password must be at least 6 characters.";
    } elseif ($new !== $confirm) {
        $err = "Passwords do not match.";
    } else {
        $newSafe = mysqli_real_escape_string($conn, $new);
        mysqli_query($conn, "UPDATE users SET password='$newSafe' WHERE id=$id");
        $msg = "Password updated successfully!";
    }
}
?>
<div class="row justify-content-center">
    <div class="col-lg-6">
        <div class="glass-card overflow-hidden">
            <div class="bg-warning text-dark text-center py-4">
                <i class="fas fa-key fa-3x mb-2"></i>
                <h3 class="mb-0 fw-bold">Change Password</h3>
            </div>
            <div class="p-4 p-md-5">
                <?php if ($err): ?>
                    <div class="alert alert-danger"><i class="fas fa-times-circle me-2"></i> <?= htmlspecialchars($err) ?></div>
                <?php endif; ?>
                <?php if ($msg): ?>
                    <div class="alert alert-success"><i class="fas fa-check-circle me-2"></i> <?= htmlspecialchars($msg) ?></div>
                <?php endif; ?>
                <form method="POST">
                    <div class="mb-3">
                        <label class="form-label text-muted fw-bold small">Current Password</label>
                        <input type="password" name="current" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label text-muted fw-bold small">New Password</label>
                        <input type="password" name="new" class="form-control" required>
                    </div>
                    <div class="mb-4">
                        <label class="form-label text-muted fw-bold small">Confirm New Password</label>
                        <input type="password" name="confirm" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-warning w-100 py-2 fw-bold shadow-sm">Update Password</button>
                    <a href="profile.php" class="btn btn-outline-secondary w-100 py-2 mt-2 fw-bold">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>