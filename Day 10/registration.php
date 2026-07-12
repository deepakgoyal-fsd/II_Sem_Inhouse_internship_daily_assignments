<?php
include("header.php");
include("db_connect.php");
include("checkRegistration.php");

?>



<div class = "container mt-5" style="max-width:400px;">
    <form action="" mathod="post">

        <h3 class="mb-3">Register</h3>

        <input type="text" class="form-control mb-3" placeholder="Name" name="name">

        <input type="email" class="form-control mb-3" placeholder="Email" name="email">

        <input type="passwprd" class="form-control mb-3" placeholder="Passwprd" name="password">

        <input type="passwprd" class="form-control mb-3" placeholder="Confirm Passwprd" name="confirmPassword">

        <button class="btn btn-primary w-100">Register</button>

    </form>
</div>



<?php

include("footer.php");

?>