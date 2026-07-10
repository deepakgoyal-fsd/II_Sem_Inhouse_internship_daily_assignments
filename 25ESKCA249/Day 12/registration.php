<?php

include("header.php");
include("db_connect.php");
include("checkRegistrationError.php");


?>

<main class="page-shell">
<div class="container">
    <form action="registration.php" method="post" class="form-card">
        <h3 class="mb-3">Register</h3>
        <p class="text-secondary mb-4">Create your account with a few quick details.</p>

        <?php if ($error != "") { ?>
            <div class="alert alert-danger py-2"><?=$error?></div>
        <?php } ?>

        <input type="text" class="form-control mb-3" placeholder="Name" name="name" value="<?=$name?>">

        <input type="email" class="form-control mb-3" placeholder="Email" name="email" value="<?=$email?>">

        <input type="password" class="form-control mb-3" placeholder="Password" name="password" value="<?=$password?>">

        <input type="password" class="form-control mb-3" placeholder="Confirm Password" name="confirmPassword" value="<?=$confirmPassword?>">


        <button class="btn btn-primary w-100">
            Register
        </button>
    </form>
</div>
</main>


<?php

include ("footer.php");

?>
