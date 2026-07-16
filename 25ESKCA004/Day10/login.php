<?php
session_start();
include("db_connect.php");
include("check_LoginError.php");
include("header.php");
?>

<div class="container mt-5" style="max-width:420px;">
    <div class="card p-4">
        <h3 class="mb-3 text-center">Welcome Back</h3>

        <?php if (!empty($error)) { ?>
            <div class="alert alert-danger"><?php echo htmlspecialchars($error); ?></div>
        <?php } ?>

        <form action="" method="post">
            <label class="form-label">Email</label>
            <input type="email" class="form-control mb-3" name="email" placeholder="Email"
                   value="<?php echo htmlspecialchars($email); ?>" required>

            <label class="form-label">Password</label>
            <input type="password" class="form-control mb-3" placeholder="Password" name="password" required>

            <button class="btn btn-primary w-100">Login</button>
        </form>

        <p class="text-center mt-3 mb-0 small">
            Don't have an account? <a href="registration.php">Register here</a>
        </p>
    </div>
</div>

<?php
include("footer.php");
?>