<?php
include("header.php");
include("db_connect.php");
include("checkRegistrationError.php");
?>
<div class="container mt-5" style="max-width:400px;">
    <form action="" method="post">
        <h3 class="mb-3">Registration</h3>
        <input type="text" class="form-control mb-3" name="name" placeholder="name" required>
        <input type="email" class="form-control mb-3" name="email" placeholder="email" required>
        <input type="text" class="form-control mb-3" name="phone_number" placeholder="phone number" required>
        <input type="password" class="form-control mb-3" name="password" placeholder="password" required>
        <input type="password" class="form-control mb-3" name="cpassword" placeholder="confirm password" required>
        <h6>Password Requirment : </h6>
        <p>It must contain at least one uppercase</p>
        <p>It must contain at least one special charater(!@#$%^&*)</p>
        <p>It must contain at least one number(1234567890)</p>
        <p>It must contain at least one lowercase</p>
        <p>It must contain at least 8 charater</p>
        <button class="btn btn-primary w-100">Register</button>
    </form>
    
</div>    
<?php
include("footer.php");
?>
