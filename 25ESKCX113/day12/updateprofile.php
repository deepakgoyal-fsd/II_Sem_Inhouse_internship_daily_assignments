<?php

include("db_connect.php");
include("dashboardheader.php");

// Get current user
$id = $_SESSION['user_id'];

$query = "SELECT * FROM user WHERE id='$id'";
$result = mysqli_query($conn, $query);
$user = mysqli_fetch_assoc($result);

include("checkupdateprofile.php");
include("dashboardverticalcontant.php");

?>

<div class="container mt-4" style="max-width:600px;">

<h3>Update Profile</h3>

<?php
if(isset($_GET['success'])){
    echo "<div class='alert alert-success'>Profile Updated Successfully.</div>";
}
?>

<form action="" method="post" enctype="multipart/form-data">

<div class="mb-3">
<label>Name</label>
<input
type="text"
class="form-control"
name="name"
value="<?= htmlspecialchars($user['name']) ?>"
required>
</div>

<div class="mb-3">
<label>Email</label>
<input
type="email"
class="form-control"
name="email"
value="<?= htmlspecialchars($user['email']) ?>"
required>
</div>

<div class="mb-3">
<label>Phone Number</label>
<input
type="text"
class="form-control"
name="phone_number"
value="<?= htmlspecialchars($user['phone_number']) ?>"
required>
</div>

<div class="mb-3">
<label>Role</label>
<input
type="text"
class="form-control"
value="<?= htmlspecialchars($user['role']) ?>"
readonly>
</div>

<div class="mb-3">

<label>Current Profile Picture</label>
<br>

<?php
if(!empty($user['profile_pic'])){
?>
<img src="<?= $user['profile_pic'] ?>" width="120" height="120">
<?php
}else{
    echo "No profile picture uploaded.";
}
?>

</div>

<div class="mb-3">

<label>Change Profile Picture</label>

<input
type="file"
name="profile_pic"
class="form-control">

</div>

<button class="btn btn-primary">
Update Profile
</button>

</form>

</div>

<?php
include("dashboardfooter.php");
include("footer.php");
?>