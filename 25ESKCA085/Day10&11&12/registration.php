<?php
include('header.php');
include("checkregistration.php");
?>

<div class="container mt-5" style="max-width:400px; ">
    <form action="" method="post">
        <h3 class="mb-3">Register</h3>

        <input type="text" name = "name" class="form-control mb-3" placeholder = "Name" value = "<?= $name?>">

        <input type="email" name = "email" class="form-control mb-3" value = "<?= $email?>" placeholder = "Email" >

        <input type="password" name = "password" class="form-control mb-3" value = "<?= $password?>" placeholder = "Password">
        <input type="password" name = "confirmpassword" value = "<?= $confirmpassword?>" class="form-control mb-3" placeholder = "Confirm Password">

        <button class="btn btn-primary w-100">Register</button>
    </form>
</div>

<?php
include('footer.php');
?>
