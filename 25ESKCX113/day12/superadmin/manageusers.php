<?php

include("../db_connect.php");

include("superadminheader.php");

include("superadminverticalcontent.php");



$query="SELECT * FROM user ORDER BY id DESC";


$result=mysqli_query($conn,$query);


?>


<h2>Manage Users</h2>


<table class="table table-bordered table-striped">


<tr class="table-dark">

<th>ID</th>
<th>Profile</th>
<th>Name</th>
<th>Email</th>
<th>Phone</th>
<th>Role</th>
<th>Action</th>

</tr>



<?php while($user=mysqli_fetch_assoc($result)){ ?>


<tr>


<td><?= $user['id']; ?></td>



<td>

<?php

if(!empty($user['profile_pic'])){

$image="../".$user['profile_pic'];

}
else{

$image="../images/default.jpg";

}

?>


<img src="<?= $image ?>"
width="50"
height="50"
class="rounded-circle">

</td>



<td><?= htmlspecialchars($user['name']); ?></td>


<td><?= htmlspecialchars($user['email']); ?></td>


<td><?= htmlspecialchars($user['phone_number']); ?></td>


<td><?= htmlspecialchars($user['role']); ?></td>



<td>


<a href="edituser.php?id=<?= $user['id']; ?>"
class="btn btn-primary btn-sm">

Edit

</a>



<a href="deleteuser.php?id=<?= $user['id']; ?>"
class="btn btn-danger btn-sm"
onclick="return confirm('Delete this user?')">

Delete

</a>


</td>


</tr>


<?php } ?>


</table>



<?php

include("../dashboardfooter.php");

include("../footer.php");

?>