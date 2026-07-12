<?php
session_start();
include("db.php");

if(!isset($_SESSION['id']))
{
    header("Location: login.php");
    exit();
}

$id = $_GET['id'];

$result = mysqli_query($conn,"SELECT * FROM user WHERE id='$id'");
$row = mysqli_fetch_assoc($result);

if(isset($_POST['update']))
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $role = $_POST['role'];

    mysqli_query($conn,"UPDATE user
    SET
    name='$name',
    email='$email',
    role='$role'
    WHERE id='$id'");

    header("Location: superadmindashboard.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Edit User</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

<div class="row justify-content-center">

<div class="col-md-6">

<div class="card shadow">

<div class="card-header bg-primary text-white text-center">

<h3>Edit User</h3>

</div>

<div class="card-body">

<form method="POST">

<div class="mb-3">
<label>Name</label>
<input type="text" name="name" class="form-control"
value="<?php echo $row['name']; ?>" required>
</div>

<div class="mb-3">
<label>Email</label>
<input type="email" name="email" class="form-control"
value="<?php echo $row['email']; ?>" required>
</div>

<div class="mb-3">
<label>Role</label>

<select name="role" class="form-select">

<option value="student" <?php if($row['role']=="student") echo "selected"; ?>>Student</option>

<option value="teacher" <?php if($row['role']=="teacher") echo "selected"; ?>>Teacher</option>

<option value="admin" <?php if($row['role']=="admin") echo "selected"; ?>>Admin</option>

<option value="superadmin" <?php if($row['role']=="superadmin") echo "selected"; ?>>Super Admin</option>

</select>

</div>

<button type="submit" name="update" class="btn btn-success w-100">
Update User
</button>

<br><br>

<a href="superadmindashboard.php" class="btn btn-secondary w-100">
Back
</a>

</form>

</div>

</div>

</div>

</div>

</div>

</body>
</html>