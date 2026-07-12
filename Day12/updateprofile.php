<?php
  include("db_connect.php");
  include("dashboardheader.php");
  include("dashboardverticalcontent.php");
  ?>


 <div class="container mt-5" style="max-width:500px;">

<h2 class="mb-3">Update Profile</h2>

<form action="" method="POST">

<input type="text"
class="form-control mb-3"
name="name"
placeholder="Name" value="<?=$_SESSION['user_name']?>" required>

<input type="file"
class="form-control mb-3"
name="file">


<button type="submit" class="btn btn-primary w-100">
Update
</button>

</form>

</div>



<?php
  include("dashboardfooter.php");
  include("footerday10.php");
  ?>

