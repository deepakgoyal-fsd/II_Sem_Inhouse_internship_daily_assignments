<?php
include ("header.php");
include ("sucess.php");
include ("checkRegistrationError.php");
?>

<div class="container mt-5" style="max-width:400px;">
    <form action="" method="post">
        <h3 class="mb-3">Register</h3>

        <input type="text" name="username" class="form-control mb-3" placeholder="Username" required>
        <input type="email" name="email" class="form-control mb-3" placeholder="Email" required>
        <input type="password" name="password" class="form-control mb-3" placeholder="Password" required>
        <input type="password" name="confirm_password" class="form-control mb-3" placeholder="Confirm Password" required>
        <button type="submit" class="btn btn-primary">Register</button>
    </form>
</div>

<br>
<?php
include ("footer.php");
?>