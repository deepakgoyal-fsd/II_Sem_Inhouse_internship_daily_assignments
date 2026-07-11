<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
require_once("roles.php");
require_once("dashoardHeader.php");

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}
?>
<div class="container mt-5">
    <div class="card p-4 align-items-center">
        <h2>Welcome, <?= htmlspecialchars($_SESSION["user_name"] ?? "") ?>!</h2>
        <p><strong>Email:</strong> <?= htmlspecialchars($_SESSION["user_email"] ?? "") ?></p>
        <p><strong>Role:</strong> <?= htmlspecialchars($_SESSION["user_role"] ?? "") ?></p>
        <div>
            <button type="button" class="btn btn-primary" style="width: 220px;">
                <a href="updateProfile.php" class="text-white text-decoration-none">Update Profile</a>
            </button>
        </div>
    </div>
</div>
<?php
require_once("footer.php");
?> 