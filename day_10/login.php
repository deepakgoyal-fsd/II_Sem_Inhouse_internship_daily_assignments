<?php

include("header.php");
include("db_connect.php");
include("checkLoginError.php");

?>

<div class="container mt-5" style="max-width:400px;">
    <form action="" method="post">

        <h3 class="mb-3">Login</h3>

        <input type="email" class="form-control mb-3" placeholder="Email" name="email" value="<?= $email ?>">

        <input type="password" class="form-control mb-3" placeholder="Password" name="password" value="<?= $password ?>">

        <button type="submit" class="btn btn-primary w-100">login</button>

    </form>
</div>

<?php
include("footer.php");
?>

