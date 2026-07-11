<?php 

    include ("db_connect.php");
    include("dashboardHeader.php");
    include("dashboardVerticalContent.php");
?>
    
    <div class="container">
        <h1>Update Password</h1>
        <form action="" method="POST">
          
            <div class="mb-3">
                <label for="password" class="form-label"></label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Old Password">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label"></label>
                <input type="password" class="form-control" id="password" name="password" placeholder="New Password">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label"></label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Confirm New Password">
            </div>
           
            <button type="submit" class="btn btn-primary">Update Password</button>
        </form>
    </div>
    <?php
    include("dashboardFooter.php");
    ?>