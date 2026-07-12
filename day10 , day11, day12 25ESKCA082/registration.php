<?php

include("DBconnect.php");
include("header.php");
include("checkregistrationerror.php");


?>

<div class="container mt-5" style="max-width:400px;";>
    <form action="" method="post">
        <h3 class="mb-3">register</h3>
            <input type="text" name="name" class="form-control mb-3" placeholder="name" value="<?=$name?>">
    
            <input type="email" name="email"class="form-control mb-3" placeholder="email" value="<?=$email?>">
        
            <input type="password" name="password" class="form-control mb-3" placeholder="password" value="<?=$password?>">
            <input type="password" name="confirmpassword" class="form-control mb-3" placeholder="confirm password" value="<?=$confirmpassword?>">

            <button class="btn btn-primary w-100" type="submit">register</button>
</div>
    </form>
<?php

include("footer.php");
?>
