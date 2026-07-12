<?php
include("header.php");
include("checkloginError.php");
?>
<div class="container mt-5"
style="max-width:400px;">
<form action="" method="post">
    <h3 class="mb-3">registration</h3>
    <input type="type" class="form-control
    mb-3" placeholder="Name" name="name">
    <input type="email" class ="form-control
    mb-3" placeholder="Email" name="email">
    <button class="btn btn-primary
    w-100">register</button>
</form>
</div>
    
<?php
include("footer.php");
?>