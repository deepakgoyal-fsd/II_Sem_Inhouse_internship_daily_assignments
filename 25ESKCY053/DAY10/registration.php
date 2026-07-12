<?php
include("header.php");
include("CheckRegistration.php");

?>

<div class="container mt-5" style="max-width:400px;">
    <form action="" method="post">
        <h3 class="mb-3">Register</h3>

        <input type="text" class="form-control mb-3" name = "name" placeholder = "name" value = "<?=$name?>">

        <input type="email" class="form-control mb-3" name = "email" placeholder = "email" value = "<?=$email?>">

        <input type="password" class="form-control mb-3" name = "password" placeholder = "password" value = "<?=$password?>">
        <input type="password" class="form-control mb-3" name = "confirmpassword" placeholder = "confirm password" value = "<?=$confirmpassword?>">

        <button class="btn btn-primary w-100">Register </button>
    </form>
</div>

<?php
include("fotter.php");
?>
