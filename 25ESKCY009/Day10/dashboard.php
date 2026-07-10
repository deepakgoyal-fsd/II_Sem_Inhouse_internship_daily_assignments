<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

include("dashhead.php");

echo "Welcome, " . htmlspecialchars($_SESSION['user_name'] ?? 'User', ENT_QUOTES, 'UTF-8') . "!";

?>
<a href="updatePassword.php">Update Password</a>
<?php
include("footer.php");
?>