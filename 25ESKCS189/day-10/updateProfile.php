<?php
include("dbconnect.php");
include("dashboardHeader.php");
include("dashboardVerticalContent.php");
?>

<form method="post" action="">
    <div class="container mt-5" style="max-width:400px;">
    <form action="" method="post">
        <h3 class="mb-3">Update Password--</h3>
        <input type="text" name="name" class="form-control mb-3" placeholder="Name" value="<?=$_SESSION["user_name"]?>">
        <input type="file" name="file" class="form-control mb-3" placeholder="Upload Profile Picture">
        <button class="btn btn-primary w-100">Update Password</button>
</form>

<?php
include("dashboardFooter.php");
include("footer.php");
?>