<?php
include("header.php");
include("checkloginError.php");
?>

<div class="container mt-5"  style="max-width:400px;">
    <form action="" method="post">
        <h3 class="mb-3">Login</h3>

        <input type="email" name="email" class="form-control mb-3" placeholder="Email"  value="<?=$email?>">
        <input type="password"name="password" class="form-control mb-3" placeholder="Password"  value="<?=$password?>">
    

        <button class="btn btn-primary w-100">Login</button>
</form>
</div>

<?php
include("footer.php");
?>