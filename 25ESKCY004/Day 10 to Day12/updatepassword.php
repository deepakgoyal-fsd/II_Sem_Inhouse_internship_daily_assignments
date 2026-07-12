<?php

session_start();
include("dashhead.php");



?>
<div class="container mt-5" style="max-width:400px;">
    <form method="POST" action="">
    <h3 class="mb-3">Update Password</h3>

        <input type="password" class="form-control mb-3" name="oldpassword" placeholder="Current Password" required>
    
        <input type="password" class="form-control mb-3" name="new_password" placeholder="New Password" required>
    
        <input type="password" class="form-control mb-3" name="confirm_new_password" placeholder="Confirm New Password" required>
    </div>
    <button type="submit" class="btn btn-primary">Update Password</button>
</form>