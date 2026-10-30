<?php
session_start();
include 'includes/config.php';

if(!isset($_SESSION['email']))
{
    header("Location: login.php");
    exit();
}

$email = $_SESSION['email'];

$query = "SELECT * FROM appointments WHERE email='$email' ORDER BY id DESC";
$result = mysqli_query($conn, $query);

include 'includes/header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>User Dashboard</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="css/style.css">

</head>

<body>

<div class="container mt-5">

<div class="card shadow mb-4">

<div class="card-body text-center">

<h2 class="text-primary">
Welcome,
<?php echo $_SESSION['name']; ?>
</h2>

<p class="text-muted">
Manage your appointments from your dashboard.
</p>

<a href="appointment.php" class="btn btn-primary">
Book New Appointment
</a>

<a href="logout.php" class="btn btn-danger">
Logout
</a>

</div>

</div>

<div class="card shadow">

<div class="card-header bg-primary text-white">
<h4>My Appointments</h4>
</div>

<div class="card-body">

<table class="table table-bordered table-hover">

<thead class="table-dark">

<tr>

<th>ID</th>
<th>Service</th>
<th>Date</th>
<th>Time</th>
<th>Status</th>

</tr>

</thead>

<tbody>

<?php

if(mysqli_num_rows($result)>0)
{
    while($row=mysqli_fetch_assoc($result))
    {
?>

<tr>

<td><?php echo $row['id']; ?></td>

<td><?php echo $row['service']; ?></td>

<td><?php echo $row['appointment_date']; ?></td>

<td><?php echo $row['appointment_time']; ?></td>

<td>

<?php

if($row['status']=="Pending")
{
    echo "<span class='badge bg-warning text-dark'>Pending</span>";
}
elseif($row['status']=="Approved")
{
    echo "<span class='badge bg-success'>Approved</span>";
}
else
{
    echo "<span class='badge bg-danger'>Rejected</span>";
}

?>

</td>

</tr>

<?php
    }
}
else
{
?>

<tr>

<td colspan="5" class="text-center text-danger">
No Appointments Found!
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
include 'includes/footer.php';
?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>