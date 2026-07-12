<?php
include("dashboard.php");
session_start();
?>
<div class = "container mt-5" style="max-width:400px;">
    <form action="" mathod="post">

    <h3 class="mb-3">Update Password</h3>
    <input type="password" class="form-control mb-3" placeholder="Old Password" name="oldpassword">
    <input type="passwprd" class="form-control mb-3" placeholder="New Password" name="newpassword">
    <input type="passwprd" class="form-control mb-3" placeholder="Confirm Password" name="confirmpassword">
    <button class="btn btn-primary w-100">Update Password</button>

    </form>
</div>
<?php
include("footer.php");
?>