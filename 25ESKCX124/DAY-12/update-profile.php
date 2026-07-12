<?php

include("includes/auth.php");
include("includes/db.php");

$id = $_SESSION['user_id'];

$message = "";

$stmt = mysqli_prepare($conn, "SELECT * FROM users WHERE id = ?");
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);
$user = mysqli_fetch_assoc($result);

// Update profile
if(isset($_POST['update'])){

    $name = trim($_POST['name']);
    $phone = trim($_POST['phone']);
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $address = trim($_POST['address']);

    $stmt = mysqli_prepare($conn,
    "UPDATE users
    SET
    name=?,
    phone=?,
    gender=?,
    dob=?,
    address=?
    WHERE id=?");

    mysqli_stmt_bind_param(
        $stmt,
        "sssssi",
        $name,
        $phone,
        $gender,
        $dob,
        $address,
        $id
    );

    if(mysqli_stmt_execute($stmt)){

        $message="<div class='alert alert-success'>
        Profile Updated Successfully
        </div>";

        // Refresh latest data
        $stmt = mysqli_prepare($conn,"SELECT * FROM users WHERE id=?");
        mysqli_stmt_bind_param($stmt,"i",$id);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);
        $user = mysqli_fetch_assoc($result);

        $_SESSION['name']=$user['name'];

    }
    else{

        $message="<div class='alert alert-danger'>
        Something went wrong.
        </div>";

    }

}

include("includes/header.php");

?>

<div class="container mt-5">

<div class="row justify-content-center">

<div class="col-lg-8">

<div class="card shadow">

<div class="card-header bg-warning">

<h3>Update Profile</h3>

</div>

<div class="card-body">

<?= $message ?>

<form method="POST">

<div class="mb-3">

<label>Full Name</label>

<input
type="text"
name="name"
class="form-control"
value="<?= htmlspecialchars($user['name']) ?>"
required>

</div>

<div class="mb-3">

<label>Email</label>

<input
type="email"
class="form-control"
value="<?= htmlspecialchars($user['email']) ?>"
readonly>

</div>

<div class="mb-3">

<label>Phone</label>

<input
type="text"
name="phone"
class="form-control"
value="<?= htmlspecialchars($user['phone']) ?>"
required>

</div>

<div class="mb-3">

<label>Gender</label>

<select
name="gender"
class="form-control">

<option
value="Male"
<?= ($user['gender']=="Male")?"selected":""; ?>>
Male
</option>

<option
value="Female"
<?= ($user['gender']=="Female")?"selected":""; ?>>
Female
</option>

</select>

</div>

<div class="mb-3">

<label>Date of Birth</label>

<input
type="date"
name="dob"
class="form-control"
value="<?= $user['dob'] ?>"
required>

</div>

<div class="mb-3">

<label>Address</label>

<textarea
name="address"
class="form-control"
rows="3"
required><?= htmlspecialchars($user['address']) ?></textarea>

</div>

<div class="d-grid">

<button
class="btn btn-warning"
name="update">

Update Profile

</button>

</div>

</form>

</div>

</div>

</div>

</div>

</div>

<?php
include("includes/footer.php");
?>