<?php
include 'auth.php';
$page = 'profile';
include 'header.php';
include 'db_connect.php';
?>
<div class="row justify-content-center">
    <div class="col-lg-6">
        <div class="glass-card p-4 text-center">
            <?php
            $avatar = (!empty($_SESSION['user_photo']) && file_exists('uploads/' . $_SESSION['user_photo'])) ? 'uploads/' . $_SESSION['user_photo'] : 'https://via.placeholder.com/150';
            ?>
            <img src="<?= $avatar ?>" class="rounded-circle shadow-lg mb-4" width="150" height="150" style="object-fit:cover; border: 5px solid white;">
            <h2 class="fw-bold mb-1"><?= htmlspecialchars($_SESSION['user_name']) ?></h2>
            <p class="text-muted fs-5 mb-4"><i class="fas fa-envelope"></i> <?= htmlspecialchars($_SESSION['user_email']) ?></p>
            <div class="d-flex justify-content-center gap-3">
                <a href="change_password.php" class="btn btn-warning shadow-sm fw-bold"><i class="fas fa-key me-2"></i> Change Password</a>
                <a href="index.php" class="btn btn-outline-secondary fw-bold">Back to Dashboard</a>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>