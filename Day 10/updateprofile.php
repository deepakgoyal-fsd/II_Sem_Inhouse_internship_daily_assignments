<?php
include("db_connect.php");
include("header2");

?>

<div class = "container mt-5" style="max-width:400px;">
    <form action="" mathod="post" >

        <h3 class="mb-3">Update Profile</h3>

        <input type="text" class="form-control mb-3" placeholder="New Name" name="newname">

        <input type="email" class="form-control mb-3" placeholder="New Email" name="newemail">

       
        

        <button class="btn btn-primary w-100">Update</button>

    </form>
</div>
