<?php
session_start();
include("dashboardHeader")

<div class="container mt-5" style="max-width:400px;">
    <form action="" method="post">
        <h3 class="mb-3">Login</h3>

        <input type="email" class="form-control mb-3" name="email" 
               placeholder="Email" value="<?= isset($email) ? $email : '' ?>">

        <input type="password" class="form-control mb-3" name="password" 
               placeholder="Password" value="<?= isset($password) ? $password : '' ?>">

        <button type="submit" name="login" class="btn btn-primary w-100">Login</button>
    </form>
</div>

<?php
include("footer.php");
?>