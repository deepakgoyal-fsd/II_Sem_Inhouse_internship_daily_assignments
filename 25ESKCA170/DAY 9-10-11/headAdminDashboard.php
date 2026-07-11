<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
require_once("roles.php");
require_once("db_connect.php");
require_once("dashoardHeader.php");

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}

if (!isHeadAdmin($_SESSION["user_role"] ?? ROLE_USER)) {
    header("Location: dashboard.php");
    exit();
}

$message = "";

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["user_id"], $_POST["role"])) {
    $targetUserId = (int) ($_POST["user_id"] ?? 0);
    $newRole = normalizeRole($_POST["role"] ?? ROLE_USER);

    if ($targetUserId === (int) $_SESSION["user_id"]) {
        $message = "You cannot change your own role.";
    } else {
        $updateQuery = "UPDATE users SET role='$newRole' WHERE id='$targetUserId'";
        if (mysqli_query($conn, $updateQuery)) {
            $message = "User role updated successfully.";
        } else {
            $message = "Error updating role: " . mysqli_error($conn);
        }
    }
}

$usersQuery = "SELECT id, name, email, role FROM users ORDER BY id";
$usersResult = mysqli_query($conn, $usersQuery);
$users = [];
while ($row = mysqli_fetch_assoc($usersResult)) {
    $users[] = $row;
}
?>

<div class="container mt-5">
    <div class="card p-4">
        <h2 class="mb-3">Head Admin Dashboard</h2>
        <p>Manage users and promote student users to admin access.</p>

        <?php if ($message !== "") : ?>
            <div class="alert alert-info"><?= htmlspecialchars($message) ?></div>
        <?php endif; ?>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>S No.</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user) : ?>
                    <tr>
                        <td><?= (int) $user["id"] ?></td>
                        <td><?= htmlspecialchars($user["name"] ?? "") ?></td>
                        <td><?= htmlspecialchars($user["email"] ?? "") ?></td>
                        <td><?= htmlspecialchars($user["role"] ?? ROLE_USER) ?></td>
                        <td>
                            <?php $userRole = normalizeRole($user["role"] ?? ROLE_USER); ?>
                            <?php if ($userRole === ROLE_USER) : ?>
                                <form method="post" class="d-inline">
                                    <input type="hidden" name="user_id" value="<?= (int) $user["id"] ?>">
                                    <input type="hidden" name="role" value="<?= ROLE_ADMIN ?>">
                                    <button class="btn btn-sm btn-success">Make Admin</button>
                                </form>
                            <?php elseif ($userRole === ROLE_ADMIN) : ?>
                                <form method="post" class="d-inline">
                                    <input type="hidden" name="user_id" value="<?= (int) $user["id"] ?>">
                                    <input type="hidden" name="role" value="<?= ROLE_USER ?>">
                                    <button class="btn btn-danger btn-sm">Demote to User</button>
                                </form>
                            <?php else : ?>
                                <span class="text-muted">No Access</span>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php require_once("footer.php"); ?>
