<?php
session_start();
if(!isset($_SESSION["admin_id"])){
    header("Location: admin_login.php");
    exit();
}
include("db_connect.php");
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $event_name=$_POST["event_name"];
    $category=$_POST["category"];
    $venue=$_POST["venue"];
    $event_date=$_POST["event_date"];
    $event_time=$_POST["event_time"];
    $ticket_price=$_POST["ticket_price"];
    $total_seats=$_POST["total_seats"];
    $description=$_POST["description"];
    $query="INSERT INTO events
    (event_name,category,venue,event_date,event_time,ticket_price,total_seats,available_seats,description)
    VALUES
    ('$event_name','$category','$venue','$event_date','$event_time','$ticket_price','$total_seats','$total_seats','$description')";
    if(mysqli_query($conn,$query)){
        echo "<script>alert('Event Added Successfully');
        window.location='view_events.php';
        </script>";
    }
    else{
        echo mysqli_error($conn);
    }
}
?>