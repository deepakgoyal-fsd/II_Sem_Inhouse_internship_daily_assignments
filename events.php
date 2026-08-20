<?php
session_start();

if(!isset($_SESSION['admin']))
{
    header("Location: ../login.php");
    exit();
}

include("../includes/db.php");

$result = mysqli_query($conn,"SELECT * FROM events");
?>

<!DOCTYPE html>
<html>
<head>

<title>Manage Events</title>

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:Arial,sans-serif;
}

body{
background:#f4f7fc;
}

header{
background:#0d47a1;
color:white;
padding:20px;
text-align:center;
}

.container{
width:95%;
margin:30px auto;
}

.btn{
display:inline-block;
padding:12px 20px;
background:green;
color:white;
text-decoration:none;
border-radius:5px;
margin-bottom:20px;
}

table{
width:100%;
border-collapse:collapse;
background:white;
box-shadow:0 5px 15px rgba(0,0,0,.2);
}

table th{
background:#1565c0;
color:white;
padding:15px;
}

table td{
padding:12px;
text-align:center;
border-bottom:1px solid #ddd;
}

img{
width:80px;
height:60px;
object-fit:cover;
border-radius:5px;
}

.edit{
background:#ff9800;
color:white;
padding:8px 15px;
text-decoration:none;
border-radius:5px;
}

.delete{
background:red;
color:white;
padding:8px 15px;
text-decoration:none;
border-radius:5px;
}

.back{
display:inline-block;
margin-top:20px;
text-decoration:none;
background:#0d47a1;
color:white;
padding:12px 20px;
border-radius:5px;
}

</style>

</head>

<body>

<header>

<h1>Manage Events</h1>

</header>

<div class="container">

<a href="add_event.php" class="btn">➕ Add New Event</a>

<table>

<tr>

<th>ID</th>

<th>Image</th>

<th>Event Name</th>

<th>Category</th>

<th>Date</th>

<th>Venue</th>

<th>Coordinator</th>

<th>Edit</th>

<th>Delete</th>

</tr>

<?php

while($row=mysqli_fetch_assoc($result))
{

?>

<tr>

<td><?php echo $row['id']; ?></td>

<td>

<img src="../images/<?php echo $row['image']; ?>">

</td>

<td><?php echo $row['event_name']; ?></td>

<td><?php echo $row['category']; ?></td>

<td><?php echo $row['event_date']; ?></td>

<td><?php echo $row['venue']; ?></td>

<td><?php echo $row['coordinator']; ?></td>

<td>

<a class="edit" href="edit_event.php?id=<?php echo $row['id']; ?>">Edit</a>

</td>

<td>

<a class="delete"
onclick="return confirm('Are you sure you want to delete this event?');"
href="delete_event.php?id=<?php echo $row['id']; ?>">

Delete

</a>

</td>

</tr>

<?php

}

?>

</table>

<br>

<a href="dashboard.php" class="back">⬅ Back to Dashboard</a>

</div>

</body>

</html>