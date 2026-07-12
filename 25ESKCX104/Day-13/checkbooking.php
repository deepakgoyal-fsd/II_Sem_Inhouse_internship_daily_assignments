<?php
session_start();
include("db_connect.php");
if(!isset($_SESSION["id"])){
    header("Location: login.php");
    exit();
}
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $user_id=$_SESSION["id"];
    $event_id=$_POST["event_id"];
    $ticket_price=$_POST["ticket_price"];
    $quantity=$_POST["quantity"];
    $check="SELECT available_seats FROM events WHERE id='$event_id'";
    $result=mysqli_query($conn,$check);
    $row=mysqli_fetch_assoc($result);
    $available=$row["available_seats"];
    if($quantity>$available){
        echo "<script>
        alert('Not enough seats available.');
        window.location='events.php';
        </script>";
        exit();
    }
    $total_amount=$ticket_price*$quantity;
    $insert="INSERT INTO bookings
(user_id,event_id,quantity,total_amount,status)
VALUES
('$user_id','$event_id','$quantity','$total_amount','Confirmed')";
    if(mysqli_query($conn,$insert)){
        $newSeats=$available-$quantity;
        mysqli_query($conn,"UPDATE events SET available_seats='$newSeats' WHERE id='$event_id'");
        echo "<script>
        alert('Booking Successful');
        window.location='my_bookings.php';
        </script>";
    }
    else{
        echo "Booking Failed";
    }
}
?>