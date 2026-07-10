<?php
session_start();
include("dashboardheader.php");
include('dashverticalcontent.php');


?>

<div class="container mt-5" style="max-width:400px; ">
    <form action="" method="post">
        <h3 class="mb-3">Update Password</h3>

        <input type="file" name="" id=""> Enter your new profle

         <input type="text" name = "name" class="form-control mb-3" placeholder = "Enter your new name">
        <input type="email" name = "email" class="form-control mb-3" placeholder = "Enter your new email" >
        

        <button class="btn btn-primary w-100">Update Profile</button>
    </form>
</div>

<?php
include('dashboardfooter.php');
include('footer.php');
?>