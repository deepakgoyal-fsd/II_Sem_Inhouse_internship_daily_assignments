<?php
session_start();
if(!isset($_SESSION["username"])){
    header("Location: login.php");
    exit();
}
include("header.php");
include("db_connect.php");
if(!isset($_GET['id'])){
    header("Location: events.php");
    exit();
}
$event_id = $_GET['id'];
$query = "SELECT * FROM events WHERE id='$event_id'";
$result = mysqli_query($conn,$query);
if(mysqli_num_rows($result)==0){
    echo "Event Not Found";
    exit();
}
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
<title>Book Ticket</title>
<style>
body{
    background:#f2f2f2;
    font-family:Arial, Helvetica, sans-serif;
}
.container{
    width:500px;
    margin:40px auto;
    background:white;
    padding:25px;
    border-radius:10px;
    box-shadow:0px 0px 10px gray;
}
h2{
    text-align:center;
    margin-bottom:20px;
}
p{
    margin:12px 0;
    font-size:18px;
}
input{
    width:100%;
    padding:10px;
    margin-top:15px;
    border:1px solid gray;
    border-radius:5px;
}
button{
    width:100%;
    margin-top:20px;
    padding:12px;
    border:none;
    background:#007bff;
    color:white;
    border-radius:5px;
    font-size:17px;
    cursor:pointer;
}
button:hover{
    background:#0056b3;
}
</style>
</head>
<body>
    <div class="container">
        <h2>Book Ticket</h2>
        <p><b>Event :</b> <?php echo $row['event_name']; ?></p>
        <p><b>Category :</b> <?php echo $row['category']; ?></p>
        <p><b>Venue :</b> <?php echo $row['venue']; ?></p>
        <p><b>Date :</b> <?php echo $row['event_date']; ?></p>
        <p><b>Time :</b> <?php echo $row['event_time']; ?></p>
        <p><b>Price :</b> ₹<?php echo $row['ticket_price']; ?></p>
        <p><b>Available Seats :</b> <?php echo $row['available_seats']; ?></p>
        <form action="payment.php" method="POST">
            <input type="hidden" name="event_id" value="<?php echo $row['id']; ?>">
            <input type="hidden" name="ticket_price" value="<?php echo $row['ticket_price']; ?>">
           <label>Number of Tickets</label>
           <input type="number" name="quantity" min="1" max="<?php echo $row['available_seats']; ?>"required>
           <button type="submit">Confirm Booking</button>
        </form>
    </div>
</body>
</html>
<?php
include("footer.php");
?>