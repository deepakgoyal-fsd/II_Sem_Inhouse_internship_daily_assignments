<?php

session_start();

if(!isset($_SESSION["id"])){

header("Location:login.php");

exit();

}

include("db_connect.php");

$booking_id=$_GET["id"];

$query="SELECT * FROM bookings WHERE id='$booking_id'";

$result=mysqli_query($conn,$query);

$row=mysqli_fetch_assoc($result);

$event_id=$row["event_id"];

$quantity=$row["quantity"];

$eventQuery="SELECT available_seats FROM events WHERE id='$event_id'";

$eventResult=mysqli_query($conn,$eventQuery);

$event=mysqli_fetch_assoc($eventResult);

$newSeats=$event["available_seats"]+$quantity;

mysqli_query($conn,
"UPDATE events
SET available_seats='$newSeats'
WHERE id='$event_id'");

mysqli_query($conn,
"UPDATE bookings
SET status='Cancelled'
WHERE id='$booking_id'");

echo "<script>

alert('Booking Cancelled Successfully');

window.location='my_bookings.php';

</script>";
$user_id = $_SESSION["id"];

$query = "SELECT * FROM bookings
WHERE id='$booking_id'
AND user_id='$user_id'
AND status='Confirmed'";

?>