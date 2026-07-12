<?php

session_start();

if(!isset($_SESSION["id"])){
    header("Location:login.php");
    exit();
}

include("header.php");

$event_id=$_POST["event_id"];
$quantity=$_POST["quantity"];
$ticket_price=$_POST["ticket_price"];

$total=$quantity*$ticket_price;

?>

<!DOCTYPE html>
<html>
<head>

<title>Payment</title>

<style>

body{
background:#f2f2f2;
font-family:Arial;
}

.container{

width:500px;
margin:40px auto;
background:white;
padding:30px;
border-radius:10px;
box-shadow:0 0 10px gray;

}

h2{

text-align:center;
margin-bottom:20px;

}

label{

font-weight:bold;

}

input,select{

width:100%;
padding:12px;
margin:10px 0;
border:1px solid #ccc;
border-radius:5px;

}

button{

width:100%;
padding:12px;
background:#28a745;
color:white;
border:none;
border-radius:5px;
cursor:pointer;

}

button:hover{

background:#218838;

}

</style>

</head>

<body>

<div class="container">

<h2>Payment</h2>

<p><b>Total Amount :</b> ₹<?php echo $total; ?></p>

<form action="payment_success.php" method="POST">

<input type="hidden" name="event_id" value="<?php echo $event_id; ?>">

<input type="hidden" name="quantity" value="<?php echo $quantity; ?>">

<input type="hidden" name="ticket_price" value="<?php echo $ticket_price; ?>">
<h3>Select Payment Method</h3>

<label>
<input
type="radio"
name="payment_method"
value="UPI"
checked>

UPI

</label>

<br><br>

<label>

<input
type="radio"
name="payment_method"
value="Credit Card">

Credit Card

</label>

<br><br>

<label>

<input
type="radio"
name="payment_method"
value="Debit Card">

Debit Card

</label>

<br><br>

<label>

<input
type="radio"
name="payment_method"
value="Net Banking">

Net Banking

</label>
<label>Transaction ID</label>

<input
type="text"
name="payment_id"
placeholder="Enter Transaction ID"
required>
<button type="submit">

Pay ₹<?php echo $total; ?>

</button>

</form>

</div>

</body>

</html>