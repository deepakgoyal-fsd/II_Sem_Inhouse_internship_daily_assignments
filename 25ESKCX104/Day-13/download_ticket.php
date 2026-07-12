<?php

session_start();

if(!isset($_SESSION["id"])){
    header("Location: login.php");
    exit();
}

include("db_connect.php");
require("fpdf/fpdf.php");

$booking_id=$_GET["id"];
$user_id=$_SESSION["id"];

$query="SELECT

bookings.*,
users.fullname,
events.event_name,
events.venue,
events.event_date,
events.event_time

FROM bookings

INNER JOIN users
ON bookings.user_id=users.id

INNER JOIN events
ON bookings.event_id=events.id

WHERE bookings.id='$booking_id'
AND bookings.user_id='$user_id'";

$result=mysqli_query($conn,$query);

$row=mysqli_fetch_assoc($result);

$pdf=new FPDF();

$pdf->AddPage();

$pdf->SetFont('Arial','B',18);

$pdf->Cell(190,10,'Ticket Booking System',0,1,'C');

$pdf->Ln(10);

$pdf->SetFont('Arial','',14);

$pdf->Cell(190,10,"Booking ID : ".$row['id'],0,1);

$pdf->Cell(190,10,"Name : ".$row['fullname'],0,1);

$pdf->Cell(190,10,"Event : ".$row['event_name'],0,1);

$pdf->Cell(190,10,"Venue : ".$row['venue'],0,1);

$pdf->Cell(190,10,"Date : ".$row['event_date'],0,1);

$pdf->Cell(190,10,"Time : ".$row['event_time'],0,1);

$pdf->Cell(190,10,"Tickets : ".$row['quantity'],0,1);

$pdf->Cell(190,10,"Amount : Rs. ".$row['total_amount'],0,1);

$pdf->Cell(190,10,"Status : ".$row['status'],0,1);

$pdf->Ln(15);

$pdf->SetFont('Arial','B',15);

$pdf->Cell(190,10,"Thank You For Booking!",0,1,'C');

$pdf->Output();

?>