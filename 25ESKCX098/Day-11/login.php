<?php
include ("header.php");
include("db_connect.php");
include ("checkloginerror.php");

?>

<div class="container mt-5"
style="max>-width:400px;">
<form action="" method = "post">
    <h3 class="mb-3">login</h3>


    <input type="email" name ="email" class="form-control
    mb-3" placeholder="email" value="<?=$email?>">
<input type="password" name="password"
    class="form-control mb-3"
    placeholder="password" value="<?=$password?>">

    <button class="btn btn-primary
    w-100">login</button>
</form>
</div>
<?php
include ("footer.php");
?>