<?php
include("SQLconnect.php");
include("dashheader.php");
include("dashcontent.php");
?>

<div class="container mt-5" style="max-width:400px; ">
    <form action="checkprofile.php" method="post" enctype="multipart/form-data">
        <h3 class="mb-3">Update Profile</h3>

         <input type="text" name = "name" class="form-control mb-3" placeholder = "Name" value="<?=$_SESSION ['user_name']?>">
         <input type="file" name = "file" class="form-control mb-3">
        
        

        <button type = "submit" class="btn btn-primary w-100" >Update</button>
    </form>
</div>

<?php
include("dashfooter.php");
include("fotter.php");
?>
