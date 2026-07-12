<?php
session_start();
if(!isset($_SESSION["id"])){
header("Location: login.php");
exit();
}
include("header.php");
include("db_connect.php");
$user=$_SESSION["id"];
$query="SELECT bookings.*,events.event_name,events.venue,events.event_date
FROM bookings
INNER JOIN events
ON bookings.event_id=events.id
WHERE bookings.user_id='$user'
ORDER BY booking_date DESC";
$result=mysqli_query($conn,$query);
?>
<!DOCTYPE html>
<html>
<head>
<title>My Bookings</title>
<style>
    body{
        font-family:Arial;
        background:#f2f2f2;
    }
    table{
        width:90%;
        margin:40px auto;
        border-collapse:collapse;
        background:white;
    }
    th,td{
        padding:15px;
        border:1px solid #ddd;
        text-align:center;
    }
    th{
        background:#007bff;
        color:white;
    }
    h1{
        text-align:center;
        margin-top:30px;
    }
</style>
</head>
<body>
    <h1>My Bookings</h1>
    <table>
        <tr>
            <th>Event</th>
            <th>Venue</th>
            <th>Date</th>
            <th>Tickets</th>
            <th>Total Amount</th>
            <th>Booking Date</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        <?php
            while($row=mysqli_fetch_assoc($result)){
        ?>
        <tr>
            <td><?php echo $row["event_name"]; ?></td>
            <td><?php echo $row["venue"]; ?></td>
            <td><?php echo $row["event_date"]; ?></td>
            <td><?php echo $row["quantity"]; ?></td>
            <td>₹<?php echo $row["total_amount"]; ?></td>
            <td><?php echo $row["booking_date"]; ?></td>
            <td><?php echo $row["status"]; ?></td>

<td>

<?php

if($row["status"]=="Confirmed"){

?>

<a href="cancel_booking.php?id=<?php echo $row['id']; ?>"
onclick="return confirm('Are you sure you want to cancel this booking?');">

Cancel Booking

</a>

<?php

}else{

echo "Cancelled";

}

?>

</td>
<td>

<a href="download_ticket.php?id=<?php echo $row['id']; ?>">

Download PDF

</a>

</td>
        </tr>
        <?php
            }
        ?>
    </table>
</body>
</html>
<?php
include("footer.php");
?>