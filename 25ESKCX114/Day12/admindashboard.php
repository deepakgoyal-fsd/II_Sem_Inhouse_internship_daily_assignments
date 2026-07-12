<?php
include("../db_connect.php");
include("adminheader.php");
include("adminverticalcontent.php");

// Allow only admins
if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] != "admin") {
    header("Location: ../login.php");
    exit();
}

$selectQuery = "SELECT * FROM user ORDER BY id DESC";
$result = mysqli_query($conn, $selectQuery);
?>

<div class="container mt-4">

<h2>Manage Users</h2>

<table class="table table-bordered table-striped">

<thead class="table-dark">

<tr>
    <th>ID</th>
    <th>Profile</th>
    <th>Name</th>
    <th>Email</th>
    <th>Phone</th>
    <th>Role</th>
    <th>Action</th>
</tr>

</thead>

<tbody>

<?php while($user = mysqli_fetch_assoc($result)){ ?>

<tr>

<td><?= $user['id']; ?></td>

<td>

<?php

if(!empty($user['profile_pic'])){

    $image = "../" . $user['profile_pic'];

}
else{

    $image = "../images/default.jpg";

}

?>

<img 
src="<?= $image; ?>"
width="60"
height="60"
class="rounded-circle"
style="object-fit:cover;"
>

</td>

<td><?= htmlspecialchars($user['name']); ?></td>

<td><?= htmlspecialchars($user['email']); ?></td>

<td><?= htmlspecialchars($user['phone_number']); ?></td>

<td><?= htmlspecialchars($user['role']); ?></td>

<td>

<a
class="btn btn-primary btn-sm"
href="edituser.php?id=<?= $user['id']; ?>">
Edit
</a>

</td>

</tr>

<?php } ?>

</tbody>

</table>

</div>

<?php
include("../dashboardfooter.php");
include("../footer.php");
?>