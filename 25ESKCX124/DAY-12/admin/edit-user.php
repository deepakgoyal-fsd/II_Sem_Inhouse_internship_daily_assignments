<?php

include("../includes/admin-auth.php");
include("../includes/db.php");

$id=$_GET['id'];

$message="";

$stmt=mysqli_prepare($conn,
"SELECT * FROM users WHERE id=?");

mysqli_stmt_bind_param($stmt,"i",$id);

mysqli_stmt_execute($stmt);

$result=mysqli_stmt_get_result($stmt);

$user=mysqli_fetch_assoc($result);

if(isset($_POST['update']))
{

$name=$_POST['name'];

$phone=$_POST['phone'];

$gender=$_POST['gender'];

$role=$_POST['role'];

$stmt=mysqli_prepare($conn,
"UPDATE users
SET
name=?,
phone=?,
gender=?,
role=?
WHERE id=?");

mysqli_stmt_bind_param(
$stmt,
"ssssi",
$name,
$phone,
$gender,
$role,
$id
);

if(mysqli_stmt_execute($stmt))
{

$message="<div class='alert alert-success'>
User Updated Successfully
</div>";

$stmt=mysqli_prepare($conn,
"SELECT * FROM users WHERE id=?");

mysqli_stmt_bind_param($stmt,"i",$id);

mysqli_stmt_execute($stmt);

$result=mysqli_stmt_get_result($stmt);

$user=mysqli_fetch_assoc($result);

}

}

include("includes/header.php");

?>

<div class="container mt-4">

<h2>Edit User</h2>

<?= $message ?>

<form method="POST">

<div class="mb-3">

<label>Name</label>

<input
type="text"
name="name"
class="form-control"
value="<?= htmlspecialchars($user['name']) ?>">

</div>

<div class="mb-3">

<label>Phone</label>

<input
type="text"
name="phone"
class="form-control"
value="<?= htmlspecialchars($user['phone']) ?>">

</div>

<div class="mb-3">

<label>Gender</label>

<select
name="gender"
class="form-control">

<option
value="Male"
<?= ($user['gender']=="Male")?"selected":"" ?>>
Male
</option>

<option
value="Female"
<?= ($user['gender']=="Female")?"selected":"" ?>>
Female
</option>

</select>

</div>

<div class="mb-3">

<label>Role</label>

<select
name="role"
class="form-control">

<option
value="user"
<?= ($user['role']=="user")?"selected":"" ?>>
User
</option>

<option
value="admin"
<?= ($user['role']=="admin")?"selected":"" ?>>
Admin
</option>

</select>

</div>

<button
class="btn btn-primary"
name="update">

Save Changes

</button>

<a
href="users.php"
class="btn btn-secondary">

Back

</a>

</form>

</div>

<?php

include("includes/footer.php");

?>