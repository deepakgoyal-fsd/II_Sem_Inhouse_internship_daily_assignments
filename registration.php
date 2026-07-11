<?php
include("header.php");
include("db_connect.php");
include("checkRegistrationError.php");

?>


<div class="container mt-5" style="max-width:400px;">

    <form action="" method="post">

        <h3 class="mb-3">Register</h3>

    
            type="text" name="name"
            class="form-control mb-3"
            placeholder="Name" value="<?=$name?>">

        <input
            type="email" name="MyEmail"
            class="form-control mb-3"
            placeholder="Email" value="<?=$email?>">

        <input
            type="password" name="Mypassword"
            class="form-control mb-3"
            placeholder="Password" value ="<?$password?>">

        <input
            type="password" name="Mypassword"
            class="form-control mb-3"
            placeholder="Confirm Password" value="<?$confirm password?>">

        <button class="btn btn-primary w-100">
            Register
        </button>

    </form>

</div>