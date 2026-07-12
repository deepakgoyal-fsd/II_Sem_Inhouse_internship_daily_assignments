<?php
include("db_connect.php");
include("dashboardheader.php");
include("dashboardverticalcontent.php");

?>
<form action="" method="post">
        <h3 class="mb-3">Update Profile</h3>

        <input type="text" class="form-control mb-3" name="name" placeholder="name" value="<?=$_SESSION ["user_name"]?>">

        <input type="File" name="file" >
        <button class="btn btn-primary w-100">Update</button>
    </form>
<?php
include("dashboardfooter.php");
include("footer.php");
?>