<?php
include("db_connect.php");
include("check_registrationError.php");
include("header.php");
?>

<div class="container mt-5" style="max-width:420px;">
    <div class="card p-4">
        <h3 class="mb-3 text-center">Create Account</h3>

        <?php if (!empty($error)) { ?>
            <div class="alert alert-danger"><?php echo htmlspecialchars($error); ?></div>
        <?php } ?>

        <form action="" method="post">
            <label class="form-label">Name</label>
            <input type="text" name="name" class="form-control mb-3" placeholder="Name"
                   value="<?php echo htmlspecialchars($name); ?>" required>

            <label class="form-label">Email</label>
            <input type="email" class="form-control mb-3" name="email" placeholder="Email"
                   value="<?php echo htmlspecialchars($email); ?>" required>

            <label class="form-label">Password</label>
            <input type="password" class="form-control mb-3" placeholder="Password" name="password" required>

            <label class="form-label">Confirm Password</label>
            <input type="password" class="form-control mb-3" placeholder="Confirm Password" name="confirmPassword" required>

            <button class="btn btn-primary w-100">Register</button>
        </form>

        <p class="text-center mt-3 mb-0 small">
            Already have an account? <a href="login.php">Login here</a>
        </p>
    </div>
</div>

<?php
include("footer.php");
?>