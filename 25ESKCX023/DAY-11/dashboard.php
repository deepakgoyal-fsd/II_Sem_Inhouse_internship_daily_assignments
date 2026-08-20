<?php
include ("dashboardheader.php");
session_start();

if(!isset($_SESSION['user_name'])) {
    header("location: login.php");
    exit();
}

echo "Welcome, ". $_SESSION['user_name']. "!";

?>

<div class="col-md-9">

<div class="card shadow p-5 mt-3">

<h2 class="text-primary">
Welcome,
<?php echo $_SESSION['user_name']; ?> 👋
</h2>

<hr>

<h5>Dashboard</h5>

<p>
You have successfully logged into the system.
Use the menu on the left to update your profile or password.
</p>

<div class="row mt-4">

<div class="col-md-4">
<div class="card bg-primary text-white p-3">
<h3>Profile</h3>
<p>Update your profile.</p>
</div>
</div>

<div class="col-md-4">
<div class="card bg-warning p-3">
<h3>Password</h3>
<p>Change your password.</p>
</div>
</div>

<div class="col-md-4">
<div class="card bg-success text-white p-3">
<h3>Status</h3>
<p>Active User</p>
</div>
</div>

</div>

</div>

</div>

</div>
</div>


<a href = "updatePassword.php" class = "btn btn-warning mt-3">Update Password</a>
<a href="updateprofile.php?id=<?php echo $_SESSION['user_id']; ?>" class="btn btn-primary mt-3">
    Update Profile
</a>

<?php
include ("footer.php");
?>