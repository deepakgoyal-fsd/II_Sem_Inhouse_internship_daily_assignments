<?php
include("header.php");
include("db_connect.php");
include("checkloginerror.php");
?>



<div class = "container mt-5" style="max-width:400px;">
    <form action="" mathod="post">

        <h3 class="mb-3">Register</h3>

       

    <input type="email" class="form-control mb-3" placeholder="Email" name="email">
    <input type="passwprd" class="form-control mb-3" placeholder="Password" name="password">
    <button class="btn btn-primary w-100">Login</button>

    </form>
</div>



<?php

include("footer.php");

?>