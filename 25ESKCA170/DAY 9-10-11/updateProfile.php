<?php
require_once("header.php");
require_once("db_connect.php");

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}

$message = "";
$newName = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $newName = trim(mysqli_real_escape_string($conn, $_POST["name"] ?? ""));

    if ($newName == "") {
        $message = "Name is required.";
    } else {
        $userId = $_SESSION["user_id"];
        $updateQuery = "UPDATE users SET name='$newName' WHERE id='$userId'";

        if (mysqli_query($conn, $updateQuery)) {
            $_SESSION["user_name"] = $newName;
            $message = "Profile updated successfully.";
        } else {
            $message = "Error updating profile: " . mysqli_error($conn);
        }
    }
}
?>

<div class="container mt-5" style="max-width:400px;">
    <form method="post">
        <h3 class="mb-3">Update Profile</h3>
        <input type="text" class="form-control mb-3" name="name" placeholder="New Name" value="<?= htmlspecialchars($_SESSION["user_name"] ?? "") ?>">
        <button class="btn btn-primary w-100">Update Profile</button>
    </form>

    <?php if ($message != "") : ?>
        <div class="alert alert-info mt-3">
            <?= htmlspecialchars($message) ?>
        </div>
    <?php endif; ?>
</div>

<?php require_once("footer.php"); ?>
