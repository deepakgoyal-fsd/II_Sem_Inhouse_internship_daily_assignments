<?php

include("header.php");

?>

<div class="container mt-5" style="max-width:400px;";>
    <form action="checkregistrationerror.php" method="post">
        <h3 class="mb-3">register</h3>
            <input type="text" name="name" class="form-control mb-3" placeholder="name">
    
            <input type="email" name="email"class="form-control mb-3" placeholder="email">
        
            <input type="password" name="password" class="form-control mb-3" placeholder="password" autocomplete="new-password">
            <input type="password" name="confirmpassword" class="form-control mb-3" placeholder="confirm password" autocomplete="new-password">
            <button class="btn btn-primary w-100" type="submit">register</button>
</div>
    </form>
<?php

include("footer.php");
?>