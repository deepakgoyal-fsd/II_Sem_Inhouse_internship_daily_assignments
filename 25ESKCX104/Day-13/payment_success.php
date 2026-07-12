<?php

session_start();

if(!isset($_SESSION["id"])){
    header("Location:login.php");
    exit();
}

include("db_connect.php");

if($_SERVER["REQUEST_METHOD"]=="POST"){

    $user_id = $_SESSION["id"];

    $event_id = $_POST["event_id"];
    $quantity = $_POST["quantity"];
    $ticket_price = $_POST["ticket_price"];

    $payment_method = $_POST["payment_method"];
    $payment_id = $_POST["payment_id"];

    $eventQuery = "SELECT * FROM events WHERE id='$event_id'";
    $eventResult = mysqli_query($conn,$eventQuery);

    $event = mysqli_fetch_assoc($eventResult);

    if($event["available_seats"] < $quantity){

        echo "<script>

        alert('Seats Not Available');

        window.location='events.php';

        </script>";

        exit();

    }

    $total_amount = $quantity * $ticket_price;

    $insert = "INSERT INTO bookings

    (user_id,event_id,quantity,total_amount,status,payment_method,payment_id)

    VALUES

    ('$user_id',
    '$event_id',
    '$quantity',
    '$total_amount',
    'Confirmed',
    '$payment_method',
    '$payment_id')";

    if(mysqli_query($conn,$insert)){

        $newSeats = $event["available_seats"] - $quantity;

        mysqli_query($conn,

        "UPDATE events
        SET available_seats='$newSeats'
        WHERE id='$event_id'");

        echo "<script>

        alert('Payment Successful');

        window.location='my_bookings.php';

        </script>";

    }

    else{

        echo mysqli_error($conn);

    }

}

?>