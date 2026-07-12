<?php
include ("header.php");
include ("checklogin.php");
?>


<div class="container mt-5" style="max-width:400px;">
    <form action="" method="post">
        <h3 class="mb-3">log in form</h3>

        
        <input type="email" class="form-control mb-3" name = "email" placeholder = "email" >
        <input type="password" class="form-control mb-3" name = "password" placeholder = "password" >

        <button type="submit" class="btn btn-primary w-100">Log in</button>
    </form>
</div>

<?php
include("fotter.php");
?>
