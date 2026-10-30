<?php
include("header.php");
include("db_connect.php");
include("checkRegistrationError.php");
?>

<div class="container mt-5" style="max-width:400px;">

    <form action="" method="POST">

        <h3 class="text-center mb-3">Register</h3>

        <input type="text"
               name="name"
               class="form-control mb-3"
               placeholder="Name">

        <input type="email"
               name="email"
               class="form-control mb-3"
               placeholder="Email">

        <input type="password"
               name="password"
               class="form-control mb-3"
               placeholder="Password">

        <input type="password"
               name="confirmPassword"
               class="form-control mb-3"
               placeholder="Confirm Password">

        <button type="submit"
                class="btn btn-primary w-100">
            Register
        </button>

    </form>

</div>

<?php include("footer.php"); ?>