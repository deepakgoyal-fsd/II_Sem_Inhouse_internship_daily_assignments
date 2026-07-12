<?php

session_start();

if(!isset($_SESSION["admin_id"])){
    header("Location:admin_login.php");
    exit();
}

include("db_connect.php");

$id=$_POST["id"];
$event_name=$_POST["event_name"];
$category=$_POST["category"];
$venue=$_POST["venue"];
$event_date=$_POST["event_date"];
$event_time=$_POST["event_time"];
$ticket_price=$_POST["ticket_price"];
$total_seats=$_POST["total_seats"];
$description=$_POST["description"];

$query="UPDATE events SET

event_name='$event_name',
category='$category',
venue='$venue',
event_date='$event_date',
event_time='$event_time',
ticket_price='$ticket_price',
total_seats='$total_seats',
description='$description'

WHERE id='$id'";

if(mysqli_query($conn,$query)){

echo "<script>

alert('Event Updated Successfully');

window.location='view_events.php';

</script>";

}

else{

echo mysqli_error($conn);

}

?>