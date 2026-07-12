<?php

include("../db_connect.php");
include("../dashboardheader.php");

if ($_SESSION['user_role'] != "admin") {
    header("Location: ../login.php");
    exit();
}

$id = $_GET['id'];

$query = "SELECT * FROM user WHERE id='$id'";
$result = mysqli_query($conn,$query);
$user = mysqli_fetch_assoc($result);

if(isset($_POST['update'])){

$name = mysqli_real_escape_string($conn,$_POST['name']);
$email = mysqli_real_escape_string($conn,$_POST['email']);
$phone = mysqli_real_escape_string($conn,$_POST['phone_number']);
$role = mysqli_real_escape_string($conn,$_POST['role']);

$profile="";

if(isset($_FILES['profile_pic']) && $_FILES['profile_pic']['error']==0){

$folder="../uploads/";

$filename=time()."_".$_FILES['profile_pic']['name'];

move_uploaded_file(
$_FILES['profile_pic']['tmp_name'],
$folder.$filename
);

$profile=", profile_pic='uploads/$filename'";

}

$update="UPDATE user
SET
name='$name',
email='$email',
phone_number='$phone',
role='$role'
$profile
WHERE id='$id'";

if(mysqli_query($conn,$update)){

header("Location: admindashboard.php");
exit();

}else{

echo mysqli_error($conn);

}

}

?>

<div class="container mt-4" style="max-width:700px;">

<h2>Edit User</h2>

<form method="post" enctype="multipart/form-data">

<div class="mb-3">

<label>Name</label>

<input
type="text"
name="name"
class="form-control"
value="<?= htmlspecialchars($user['name']) ?>">

</div>

<div class="mb-3">

<label>Email</label>

<input
type="email"
name="email"
class="form-control"
value="<?= htmlspecialchars($user['email']) ?>">

</div>

<div class="mb-3">

<label>Phone</label>

<input
type="text"
name="phone_number"
class="form-control"
value="<?= htmlspecialchars($user['phone_number']) ?>">

</div>

<div class="mb-3">

<label>Role</label>

<select name="role" class="form-control">

    <option value="student" <?= ($user['role']=="student") ? "selected" : "" ?>>
        Student
    </option>

    <option value="teacher" <?= ($user['role']=="teacher") ? "selected" : "" ?>>
        Teacher
    </option>

    <option value="admin" <?= ($user['role']=="admin") ? "selected" : "" ?>>
        Admin
    </option>

    <option value="superadmin" <?= ($user['role']=="superadmin") ? "selected" : "" ?>>
        Super Admin
    </option>

</select>

</div>

<div class="mb-3">

<label>Current Image</label><br>

<?php

if(!empty($user['profile_pic'])){

?>

<img
src="../<?= $user['profile_pic']; ?>"
width="120">

<?php

}else{

echo "No Image";

}

?>

</div>

<div class="mb-3">

<label>New Image</label>

<input
type="file"
name="profile_pic"
class="form-control">

</div>

<button
name="update"
class="btn btn-success">

Update User

</button>

</form>

</div>

<?php
include("../dashboardfooter.php");
include("../footer.php");
?>