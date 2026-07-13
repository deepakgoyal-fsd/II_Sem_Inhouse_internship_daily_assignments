<?php
include("db_connect.php");
include("dashboardheader.php");
include("dashboardverticalcontant.php");
?>

<form action="" method="post" >
    <h3 class="mb-3">UPDATE PROFILE</h3>
    <input type="text" class="form-control mb-3" name="name" placeholder="name" required>
    <input type="file" value="file">
    <button class="btn btn-primary w-100">UPDATE</button>
</form>


<?php

include("dashboardfooter.php");
include ("footer.php");
?>
