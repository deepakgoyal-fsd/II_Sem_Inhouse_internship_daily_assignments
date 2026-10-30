<?php
include("db_connect.php");
include("dashboardheader.php");
include("dashboardvertical.php");
?>
<div class="container mt-5" style="max-width:400px;">
    <form action="" method = "post">
        <h3 class="mb-3">updateprofile</h3>

        <input type="password" class="form-control mb-3" placeholder="name" name="<?=$_SESSION["user_name"]?>">

        <input type="file" class="form-control mb-3" placeholder="newPassword" name="newpassword" >

        

        


        <button class="btn btn-primary w-100">Login</button>
    </form>
</div>

    <h2>
         <?php echo "welcome,". $_SESSION['user_name']. "!";
?>
    </h2>
<?php
include("dashboardfooter.php");
include("footer.php");

?>