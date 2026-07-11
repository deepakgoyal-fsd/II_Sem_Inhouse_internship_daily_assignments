<?php
require_once ("header.php");
require_once ("db_connect.php");
require_once ("checkLoginError.php");
?>

<div class="container mt-5" style="max-width:400px;">
    <form action="" method = "post">
        <h3 class="mb-3">Login</h3>

        <input type="email" class="form-control mb-3" name="email" placeholder="Email" value="<?= $email?>">

        <input type="password" class="form-control mb-3" placeholder="Password" name="password" value="<?= $password?>">

        <button class="btn btn-primary w-100">Login</button>
    </form>

    <div class="mt-3 text-center">
        <a href="registeration.php" class="btn btn-outline-secondary btn-sm">Go Back</a>
    </div>
</div>

<?php require_once("footer.php"); ?>