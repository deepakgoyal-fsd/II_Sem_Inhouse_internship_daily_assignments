<?php

include("header.php");
include("db_connect.php");
include("checkLoginError.php");


?>

<main class="page-shell">
<div class="container">
    <form action="" method="post" class="form-card">
        <h3 class="mb-3">Login</h3>
        <p class="text-secondary mb-4">Welcome back. Please login to continue.</p>
        
        <?php if ($error != "") { ?>
            <div class="alert alert-danger py-2"><?=$error?></div>
        <?php } ?>

        <input type="email" class="form-control mb-3" placeholder="Email" name="email" value="<?=$email?>">

        <input type="password" class="form-control mb-3" placeholder="Password" name="password" value="<?=$password?>">


        <button class="btn btn-primary w-100">
            Login
        </button>
    </form>
</div>
</main>


<?php

include ("footer.php");

?>
