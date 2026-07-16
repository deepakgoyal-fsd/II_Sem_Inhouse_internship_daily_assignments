<?php
session_start();

if (!isset($_SESSION['user_name'])) {
    header("Location: login.php");
    exit();
}

include("db_connect.php");
include("checkUpdareError.php");   // process POST before any HTML output
include("header.php");
include("dashboardVerticalContent.php");
?>

<div class="card p-4" style="max-width:500px;">
    <h3 class="mb-3">Update Password</h3>

    <?php if (!empty($error)) { ?>
        <div class="alert <?php echo $error === 'Password updated successfully!' ? 'alert-success' : 'alert-danger'; ?>">
            <?php echo htmlspecialchars($error); ?>
        </div>
    <?php } ?>

    <form action="" method="post">
        <label class="form-label">Old Password</label>
        <input type="password" name="oldpassword" class="form-control mb-3" placeholder="Old Password" required>

        <label class="form-label">New Password</label>
        <input type="password" name="newpassword" class="form-control mb-3" placeholder="New Password" required>

        <label class="form-label">Confirm New Password</label>
        <input type="password" name="confirmpassword" class="form-control mb-3" placeholder="Confirm Password" required>

        <button class="btn btn-primary w-100">Update Password</button>
    </form>
</div>

<?php
include("dashboardFooter.php");
include("footer.php");
?>