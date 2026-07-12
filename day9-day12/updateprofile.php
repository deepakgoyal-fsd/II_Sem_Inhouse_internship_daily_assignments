<?php
include("db_connect.php");
include("dashboardHeader.php");
include("dashboardVerticalContent.php");
?>
<div class="container mt-5" style="max-width:400px;">
    <form action="" method="post">
        <h3 class="mb-3">Update Profile</h3>
        
        <input type="text" class="form-control mb-3" name="name" placeholder="Name" value="<?=$_SESSION['user_name']?>">
        
        <input type="file" name="file">
        
        <button class="btn btn-primary w-100">Update</button>
    </form>
</div>
<form action="process_upload.php" method="POST" enctype="multipart/form-data">
    <div class="mb-3">
        <label class="form-label fw-semibold text-secondary">Choose Profile Picture</label>
        <input type="file" name="profile_pic" class="form-control" accept="image/*" required>
    </div>
    <button type="submit" class="btn btn-primary">Upload Photo</button>
</form>
<?php
include("dashboardFooter.php");
include("footer.php");
?>