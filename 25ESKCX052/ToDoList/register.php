<?php include('header.php'); include('checkRegister.php'); ?>

<div class="container">
    <div class="todo-app">
        <h1 id="app-title">Create Account</h1>

        <?php if ($error): ?>
            <div class="error-msg"><?php echo $error; ?></div>
        <?php endif; ?>

        <form class="auth-form" action="" method="post">
            <input type="text" name="username" placeholder="Username" value="<?= $name; ?>" required>
            <input type="email" name="email" placeholder="Email" value="<?= $email; ?>" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="password" name="confirm_password" placeholder="Confirm Password" required>
            <button type="submit">Register</button>
        </form>

        <p class="auth-link">Already have an account? <a href="login.php">Login</a></p>
    </div>
</div>

<?php include('footer.php'); ?>
