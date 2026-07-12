<?php

session_start();

if(!isset($_SESSION["admin_id"])){
    header("Location:admin_login.php");
    exit();
}

include("db_connect.php");

$id=$_GET["id"];

$query="SELECT * FROM events WHERE id='$id'";

$result=mysqli_query($conn,$query);

$row=mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html>
<head>

<title>Edit Event</title>

<style>

body{
background:#f2f2f2;
font-family:Arial;
}

.container{

width:550px;
margin:40px auto;
background:white;
padding:30px;
border-radius:10px;
box-shadow:0px 0px 10px gray;

}

h2{

text-align:center;
margin-bottom:20px;

}

input,select,textarea{

width:100%;
padding:12px;
margin:10px 0;
border:1px solid #ccc;
border-radius:5px;

}

textarea{

height:120px;
resize:none;

}

button{

width:100%;
padding:12px;
background:#007bff;
color:white;
border:none;
border-radius:5px;
cursor:pointer;

}

button:hover{

background:#0056b3;

}

</style>

</head>

<body>

<div class="container">

<h2>Edit Event</h2>

<form action="update_event.php" method="POST">

<input
type="hidden"
name="id"
value="<?php echo $row['id']; ?>">

<input
type="text"
name="event_name"
value="<?php echo $row['event_name']; ?>"
required>

<select name="category">

<option <?php if($row['category']=="Movie") echo "selected"; ?>>Movie</option>

<option <?php if($row['category']=="Concert") echo "selected"; ?>>Concert</option>

<option <?php if($row['category']=="Sports") echo "selected"; ?>>Sports</option>

<option <?php if($row['category']=="Seminar") echo "selected"; ?>>Seminar</option>

<option <?php if($row['category']=="Festival") echo "selected"; ?>>Festival</option>

</select>

<input
type="text"
name="venue"
value="<?php echo $row['venue']; ?>"
required>

<input
type="date"
name="event_date"
value="<?php echo $row['event_date']; ?>"
required>

<input
type="time"
name="event_time"
value="<?php echo $row['event_time']; ?>"
required>

<input
type="number"
name="ticket_price"
value="<?php echo $row['ticket_price']; ?>"
required>

<input
type="number"
name="total_seats"
value="<?php echo $row['total_seats']; ?>"
required>

<textarea
name="description"
required><?php echo $row['description']; ?></textarea>

<button type="submit">

Update Event

</button>

</form>

</div>

</body>

</html>