<?php
include ("header.php");
include ("db_connect.php");
include ("checkregisterationerror.php");
?>

<div class="container mt-5" style="max-width:400px;">
    <form action="" method="post">
        <h3 class="mb-3">Registration Form</h3>

        <input type="text" class="form-control mb-3"  name ="name" placeholder="Name" value="<?php echo ($name); ?>">
        <input type="email" class="form-control mb-3" name="email" placeholder="email" value="<?php echo ($email); ?>">
        <input type="password" class="form-control mb-3" name="password" placeholder="Password">
        <input type="password" class="form-control mb-3" name="confirmpassword" placeholder="Confirmpassword">

        <button class="btn btn-primary w-100">Register</button>
    </form>
</div>

<?php
include ("footer.php");
?>