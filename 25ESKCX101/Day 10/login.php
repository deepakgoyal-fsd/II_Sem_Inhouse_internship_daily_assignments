<?php
session_start();
require_once 'db_connect.php';
include 'header.php';

$message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $loginInput = trim($_POST['login_input'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if ($loginInput !== '' && $password !== '') {
        $stmt = $conn->prepare("SELECT id, user_name, email, password, full_name FROM users WHERE user_name = ? OR email = ?");
        $stmt->bind_param("ss", $loginInput, $loginInput);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['user_name'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['full_name'] = $user['full_name'];

            header("Location: dashboard.php");
            exit();
        }

        $message = "Invalid username/email or password.";
    } else {
        $message = "Please enter both fields.";
    }
}
?>
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card p-4">
            <h2 class="mb-3">Login</h2>
            <?php if ($message !== ''): ?>
                <div class="alert alert-danger"><?= htmlspecialchars($message) ?></div>
            <?php endif; ?>
            <form method="post">
                <div class="mb-3">
                    <label class="form-label">Username or Email</label>
                    <input type="text" name="login_input" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Login</button>
            </form>
            <p class="mt-3 mb-0">No account? <a href="register.php">Register</a></p>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>