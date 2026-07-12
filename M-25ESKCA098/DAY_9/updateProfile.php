<?php
include("db_connect.php");
include("dashboardheader.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
     <div class="container mt-5" style="max-width:400px;">
    <form action="" method="POST">
        <h3 class="mb-3">Update profile</h3>
       <input type="text" name="name" class="form-control mb-3" placeholder="name" >
        <input type="email" name="email" class="form-control mb-3" placeholder="email" >

       
        <input type="submit" class="btn btn-primary w-100" value="update">
</form>
</div>

</body>
</html>
<?php
include("dashboardfooter.php");
include("footer.php");
?>
