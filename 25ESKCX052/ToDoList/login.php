<?php include('header.php'); include('checkLogin.php'); ?>

<div class="container">
    <div class="todo-app">
        <h1 id="app-title">To-Do App</h1>

        <?php if ($error): ?>
            <div class="error-msg"><?php echo $error; ?></div>
        <?php endif; ?>

        <form class="auth-form" action="" method="post">
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>

        <p class="auth-link">No account? <a href="register.php">Register</a></p>
    </div>
</div>

<?php include('footer.php'); ?>
