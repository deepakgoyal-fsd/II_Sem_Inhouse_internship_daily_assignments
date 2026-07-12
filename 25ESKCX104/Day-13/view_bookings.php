<?php

session_start();

if(!isset($_SESSION["admin_id"])){
    header("Location:admin_login.php");
    exit();
}

include("db_connect.php");

$query="SELECT

bookings.*,

users.fullname,

events.event_name

FROM bookings

INNER JOIN users

ON bookings.user_id=users.id

INNER JOIN events

ON bookings.event_id=events.id

ORDER BY booking_date DESC";

$result=mysqli_query($conn,$query);

?>

<!DOCTYPE html>

<html>

<head>

<title>View Bookings</title>

<style>

body{

font-family:Arial;
background:#f2f2f2;

}

table{

width:95%;
margin:auto;
border-collapse:collapse;
background:white;

}

th,td{

padding:12px;
border:1px solid #ddd;
text-align:center;

}

th{

background:#007bff;
color:white;

}

h1{

text-align:center;
margin:30px;

}

</style>

</head>

<body>

<h1>

All Bookings

</h1>

<table>

<tr>

<th>ID</th>

<th>User</th>

<th>Event</th>

<th>Tickets</th>

<th>Total Amount</th>

<th>Booking Date</th>
<th>Payment Method</th>
<th>Transaction ID</th>

</tr>

<?php

while($row=mysqli_fetch_assoc($result)){

?>

<tr>

<td><?php echo $row["id"]; ?></td>

<td><?php echo $row["fullname"]; ?></td>

<td><?php echo $row["event_name"]; ?></td>

<td><?php echo $row["quantity"]; ?></td>

<td>₹<?php echo $row["total_amount"]; ?></td>

<td><?php echo $row["booking_date"]; ?></td>
<td><?php echo $row["payment_method"]; ?></td>

<td><?php echo $row["payment_id"]; ?></td>
</tr>

<?php

}

?>

</table>

</body>

</html>