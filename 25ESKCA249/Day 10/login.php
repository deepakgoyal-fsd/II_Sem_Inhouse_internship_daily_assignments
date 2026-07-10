<?php
include("header.php");
include("db_connect.php");
include("checkLoginError.php");
?>

<div class="container mt-5" style="max-width:400px;">
    <form action="" method="post">
        <h3 class="mb-3">Login</h3>

        <input type="text" class="form-control mb-3" placeholder="Name" name="name">

        <input type="email" class="form-control mb-3" placeholder="Email" name="email">

        <input type="password" class="form-control mb-3" placeholder="Password" name="password">

        <input type="password" class="form-control mb-3" placeholder="Confirm Password" name="confirmPassword">

        <div class="d-flex justify-content-center">
        <button class="btn btn-primary">
            Login
        </button>
        </div>
    </form>
</div>


<?php
include ("footer.php");

?>
