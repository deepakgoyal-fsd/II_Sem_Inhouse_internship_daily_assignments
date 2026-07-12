<?php

include("logindashboard.php");
include("db-connect.php");
include("checkLoginError.php");
?>

<div class="container mt-5" style="max-width:400px;">

    <form action="" method="POST">

        <h3 class="mb-3 text-center">Login</h3>

        <input
            type="email"
            class="form-control mb-3"
            name="email"
            placeholder="Email"
            value="<?= isset($email) ? htmlspecialchars($email) : '' ?>"
            required>

        <input
            type="password"
            class="form-control mb-3"
            name="password"
            placeholder="Password"
            required>

        <button type="submit" class="btn btn-primary w-100">
            Login
        </button>

        <p class="text-center mt-3">
            Don't have an account?
            <a href="registration.php">Register</a>
        </p>

    </form>

</div>

<?php
include("footer.php");
?>