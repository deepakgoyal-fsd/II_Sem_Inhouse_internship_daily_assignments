<?php
include("logindashboard.php");
include("db-connect.php");
include("checkRegistrationError.php");
?>

<div class="container mt-5" style="max-width:400px;">

    <form action="" method="POST">

        <h3 class="text-center mb-3">Register</h3>

        <input
            type="text"
            name="name"
            class="form-control mb-3"
            placeholder="Name"
            value="<?= isset($name) ? htmlspecialchars($name) : '' ?>"
            required>

        <input
            type="email"
            name="email"
            class="form-control mb-3"
            placeholder="Email"
            value="<?= isset($email) ? htmlspecialchars($email) : '' ?>"
            required>

        <input
            type="password"
            name="password"
            class="form-control mb-3"
            placeholder="Password"
            required>

        <input
            type="password"
            name="confirmpassword"
            class="form-control mb-3"
            placeholder="Confirm Password"
            required>

        <button
            type="submit"
            class="btn btn-success w-100">
            Register
        </button>

        <p class="text-center mt-3">
            Already have an account?
            <a href="login.php">Login</a>
        </p>

    </form>

</div>

<?php
include("footer.php");
?>