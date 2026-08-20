<?php
session_start();

if(!isset($_SESSION['admin']))
{
    header("Location: ../login.php");
    exit();
}

include("../includes/db.php");

if(isset($_POST['submit']))
{
    $event_name = $_POST['event_name'];
    $category = $_POST['category'];
    $description = $_POST['description'];
    $event_date = $_POST['event_date'];
    $venue = $_POST['venue'];
    $coordinator = $_POST['coordinator'];

    $image = $_FILES['image']['name'];
    $temp = $_FILES['image']['tmp_name'];

    move_uploaded_file($temp,"../images/".$image);

    $sql = "INSERT INTO events
    (event_name,category,description,event_date,venue,coordinator,image)
    VALUES
    ('$event_name','$category','$description','$event_date','$venue','$coordinator','$image')";

    if(mysqli_query($conn,$sql))
    {
        echo "<script>alert('Event Added Successfully');</script>";
    }
    else
    {
        echo "<script>alert('Error Adding Event');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>

<title>Add Event</title>

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:Arial,sans-serif;
}

body{
background:#eef2f7;
}

.container{
width:600px;
margin:40px auto;
background:white;
padding:30px;
border-radius:10px;
box-shadow:0 5px 15px rgba(0,0,0,0.2);
}

h2{
text-align:center;
color:#0d47a1;
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
resize:none;
}

button{
width:100%;
padding:12px;
background:#0d47a1;
color:white;
border:none;
border-radius:5px;
font-size:18px;
cursor:pointer;
}

button:hover{
background:#1565c0;
}

a{
text-decoration:none;
display:inline-block;
margin-top:20px;
color:#0d47a1;
font-weight:bold;
}

</style>

</head>

<body>

<div class="container">

<h2>Add New Event</h2>

<form method="POST" enctype="multipart/form-data">

<input type="text" name="event_name" placeholder="Event Name" required>

<select name="category" required>
<option value="">Select Category</option>
<option>Technical</option>
<option>Cultural</option>
<option>Sports</option>
<option>Workshop</option>
</select>

<textarea name="description" rows="5" placeholder="Event Description" required></textarea>

<input type="date" name="event_date" required>

<input type="text" name="venue" placeholder="Venue" required>

<input type="text" name="coordinator" placeholder="Coordinator Name" required>

<input type="file" name="image" required>

<button type="submit" name="submit">Add Event</button>

</form>

<a href="dashboard.php">⬅ Back to Dashboard</a>

</div>

</body>
</html>