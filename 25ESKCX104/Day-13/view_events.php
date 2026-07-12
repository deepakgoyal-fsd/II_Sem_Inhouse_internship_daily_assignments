<?php
session_start();
if(!isset($_SESSION["admin_id"])){
    header("Location: admin_login.php");
    exit();
}
include("db_connect.php");
$query = "SELECT * FROM events ORDER BY event_date ASC";
$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html>
<head>
<title>Manage Events</title>
<style>
    body{
        font-family:Arial;
        background:#f2f2f2;
    }
    h1{
        text-align:center;
        margin:30px;
    }
    table{
        width:95%;
        margin:auto;
        border-collapse:collapse;
        background:white;
    }
    th,td{
        border:1px solid #ddd;
        padding:12px;
        text-align:center;
    }
    th{
        background:#007bff;
        color:white;
    }
    a{
        text-decoration:none;
        color:white;
        padding:8px 12px;
        border-radius:5px;
    }
    .edit{
        background:green;
    }
    .delete{
        background:red;
    }
</style>
</head>
<body>
    <h1>Manage Events</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Event</th>
            <th>Category</th>
            <th>Venue</th>
            <th>Date</th>
            <th>Time</th>
            <th>Price</th>
            <th>Seats</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
<?php
while($row = mysqli_fetch_assoc($result)){
?>
        <tr>
            <td><?php echo $row["id"]; ?></td>
            <td><?php echo $row["event_name"]; ?></td>
            <td><?php echo $row["category"]; ?></td>
            <td><?php echo $row["venue"]; ?></td>
            <td><?php echo $row["event_date"]; ?></td>
            <td><?php echo $row["event_time"]; ?></td>
            <td>₹<?php echo $row["ticket_price"]; ?></td>
            <td><?php echo $row["available_seats"]; ?></td>
            <td>
                <a class="edit" href="edit_event.php?id=<?php echo $row['id']; ?>">Edit</a>
            </td>
            <td>
                <a class="delete" href="delete_event.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Delete this event?')">Delete</a>
            </td>
        </tr>
<?php
}
?>
</table>
</body>
</html>