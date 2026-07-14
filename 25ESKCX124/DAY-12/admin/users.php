<?php

include("../includes/admin-auth.php");
include("../includes/db.php");

$search = "";

if(isset($_GET['search']))
{
    $search = trim($_GET['search']);

    $stmt = mysqli_prepare($conn,
    "SELECT * FROM users
    WHERE name LIKE ?
    OR email LIKE ?
    ORDER BY id DESC");

    $like = "%".$search."%";

    mysqli_stmt_bind_param($stmt,"ss",$like,$like);

    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

}
else{

    $result = mysqli_query($conn,
    "SELECT * FROM users
    ORDER BY id DESC");

}

include("includes/header.php");

?>

<div class="container-fluid">

<div class="row">

<div class="col-md-2">

<?php include("includes/sidebar.php"); ?>

</div>

<div class="col-md-10 p-4">

<h2>

Manage Users

</h2>

<hr>

<form method="GET">

<div class="row mb-3">

<div class="col-md-5">

<input
type="text"
name="search"
class="form-control"
placeholder="Search by Name or Email"
value="<?= htmlspecialchars($search) ?>">

</div>

<div class="col-md-2">

<button
class="btn btn-primary">

Search

</button>

</div>

<div class="col-md-2">

<a
href="users.php"
class="btn btn-secondary">

Reset

</a>

</div>

</div>

</form>

<table class="table table-bordered table-hover">

<thead class="table-dark">

<tr>

<th>ID</th>

<th>Name</th>

<th>Email</th>

<th>Phone</th>

<th>Role</th>

<th>Clicks</th>

<th>Registered</th>

<th width="170">

Action

</th>

</tr>

</thead>

<tbody>

<?php

while($user=mysqli_fetch_assoc($result))
{

?>

<tr>

<td><?= $user['id'] ?></td>

<td><?= htmlspecialchars($user['name']) ?></td>

<td><?= htmlspecialchars($user['email']) ?></td>

<td><?= htmlspecialchars($user['phone']) ?></td>

<td><?= ucfirst($user['role']) ?></td>

<td><?= $user['click_count'] ?></td>

<td><?= $user['created_at'] ?></td>

<td>

<a
href="edit-user.php?id=<?= $user['id'] ?>"
class="btn btn-warning btn-sm">

Edit

</a>

<a
href="delete-user.php?id=<?= $user['id'] ?>"
class="btn btn-danger btn-sm"
onclick="return confirm('Delete this user?');">

Delete

</a>

</td>

</tr>

<?php

}

?>

</tbody>

</table>

</div>

</div>

</div>

<?php

include("includes/footer.php");

?>