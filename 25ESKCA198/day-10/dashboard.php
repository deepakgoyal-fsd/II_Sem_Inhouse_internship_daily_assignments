```php
<?php
session_start();

if(!isset($_SESSION['id'])){
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Dashboard</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<nav class="navbar navbar-dark bg-primary">

<div class="container">

<span class="navbar-brand">
Student Dashboard
</span>

<a href="logout.php" class="btn btn-light">
Logout
</a>

</div>

</nav>

<div class="container mt-5">

<div class="card shadow">

<div class="card-body text-center">

<h2>
Welcome,
<?php echo $_SESSION['name']; ?> 👋
</h2>

<p class="mt-3">
You have successfully logged into the system.
</p>

<table class="table table-bordered mt-4">

<tr>
<th>Name</th>
<td><?php echo $_SESSION['name']; ?></td>
</tr>

<tr>
<th>Email</th>
<td><?php echo $_SESSION['email']; ?></td>
</tr>

<tr>
<th>User ID</th>
<td><?php echo $_SESSION['id']; ?></td>
</tr>

</table>

</div>

</div>

</div>

</body>
</html>
```
