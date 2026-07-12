<?php
include("dashboardheader.php");
?>

<div class="row justify-content-center">

<div class="col-md-8">

<div class="card shadow">

<div class="card-header bg-success text-white text-center">

<h2>Welcome to Dashboard</h2>

</div>

<div class="card-body">

<h3 class="text-primary">

Welcome,
<?php echo $_SESSION['name']; ?>

</h3>

<hr>

<table class="table table-bordered">

<tr>
<th>User ID</th>
<td><?php echo $_SESSION['id']; ?></td>
</tr>

<tr>
<th>Name</th>
<td><?php echo $_SESSION['name']; ?></td>
</tr>

<tr>
<th>Email</th>
<td><?php echo $_SESSION['email']; ?></td>
</tr>

</table>
<div class="text-center mt-4">

<a href="updatepassword.php" class="btn btn-warning me-2">
Update Password
</a>

<a href="logout.php" class="btn btn-danger">
Logout
</a>

</div>
</div>

</div>

</div>

</div>

</div>

</body>
</html>