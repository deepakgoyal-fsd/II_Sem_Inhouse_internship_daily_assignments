<?php
include ("dashboardheader.php");
//include ("db_connect.php");
include ("checkloginerror.php");
?>

<div class="container mt-5" style="max-width:400px;">
    
        <h3 class="mb-3">Login</h3>
        <form action="" method = "post">
        <input type="email" class="form-control mb-3" name="email" placeholder="Email" required>

        <input type="password" class="form-control mb-3" placeholder="Password" name="password" required>


        <button type="submit" class="btn btn-primary w-100">Login</button>
        <p class="text-center mt-3">Don't have an account? 
            <a href="registration1.php">Register</a></p>
    </form>
</div>