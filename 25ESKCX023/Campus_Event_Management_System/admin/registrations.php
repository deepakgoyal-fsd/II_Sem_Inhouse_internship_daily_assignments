<?php
session_start();

if(!isset($_SESSION['admin']))
{
    header("Location: ../login.php");
    exit();
}

include("../includes/db.php");

$result = mysqli_query($conn,"SELECT * FROM registrations ORDER BY id DESC");
?>

<!DOCTYPE html>
<html>
<head>

<title>Student Registrations</title>

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

tr:hover{
background:#f2f2f2;
}

.back{
display:inline-block;
margin-top:20px;
padding:12px 20px;
background:#0d47a1;
color:white;
text-decoration:none;
border-radius:5px;
}

</style>

</head>

<body>

<header>

<h1>Student Event Registrations</h1>

</header>

<div class="container">

<table>

<tr>

<th>ID</th>
<th>Student Name</th>
<th>Roll No</th>
<th>Branch</th>
<th>Year</th>
<th>Email</th>
<th>Phone</th>
<th>Category</th>
<th>Event Name</th>

</tr>

<?php

while($row=mysqli_fetch_assoc($result))
{

?>

<tr>

<td><?php echo $row['id']; ?></td>
<td><?php echo $row['student_name']; ?></td>
<td><?php echo $row['roll_no']; ?></td>
<td><?php echo $row['branch']; ?></td>
<td><?php echo $row['year']; ?></td>
<td><?php echo $row['email']; ?></td>
<td><?php echo $row['phone']; ?></td>
<td><?php echo $row['category']; ?></td>
<td><?php echo $row['event_name']; ?></td>

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