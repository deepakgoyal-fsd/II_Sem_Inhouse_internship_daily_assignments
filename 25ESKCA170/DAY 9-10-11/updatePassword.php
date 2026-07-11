<?php
require_once("header.php");
require_once("db_connect.php");

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}

$message = "";
$oldPassword = "";
$newPassword = "";
$confirmPassword = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $oldPassword = mysqli_real_escape_string($conn, $_POST["old_password"] ?? "");
    $newPassword = mysqli_real_escape_string($conn, $_POST["new_password"] ?? "");
    $confirmPassword = mysqli_real_escape_string($conn, $_POST["confirm_password"] ?? "");

    if ($oldPassword == "" || $newPassword == "" || $confirmPassword == "") {
        $message = "All fields are required.";
    } elseif ($newPassword != $confirmPassword) {
        $message = "New password and confirm password do not match.";
    } else {
        $userId = $_SESSION["user_id"];
        $checkQuery = "SELECT id FROM users WHERE id='$userId' AND password='$oldPassword' LIMIT 1";
        $checkResult = mysqli_query($conn, $checkQuery);

        if (mysqli_num_rows($checkResult) > 0) {
            $updateQuery = "UPDATE users SET password='$newPassword' WHERE id='$userId'";

            if (mysqli_query($conn, $updateQuery)) {
                $message = "Password updated successfully.";
                $oldPassword = "";
                $newPassword = "";
                $confirmPassword = "";
            } else {
                $message = "Error updating password: " . mysqli_error($conn);
            }
        } else {
            $message = "Old password is incorrect.";
        }
    }
}
?>

<div class="container mt-5" style="max-width:400px;">
    <form method="post">
        <h3 class="mb-3">Update Password</h3>
        <input type="password" class="form-control mb-3" name="old_password" placeholder="Old Password" value="<?= htmlspecialchars($oldPassword) ?>">
        <input type="password" class="form-control mb-3" name="new_password" placeholder="New Password" value="<?= htmlspecialchars($newPassword) ?>">
        <input type="password" class="form-control mb-3" name="confirm_password" placeholder="Confirm New Password" value="<?= htmlspecialchars($confirmPassword) ?>">
        <button class="btn btn-primary w-100">Update Password</button>
    </form>

    <?php if ($message != "") : ?>
        <div class="alert alert-info mt-3">
            <?= htmlspecialchars($message) ?>
        </div>
    <?php endif; ?>
</div>

<?php require_once("footer.php"); ?>
