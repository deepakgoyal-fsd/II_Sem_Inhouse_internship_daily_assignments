<?php
session_start();

if(!isset($_SESSION['admin']))
{
    header("Location: ../login.php");
    exit();
}

include("../includes/db.php");

$id = $_GET['id'];

$result = mysqli_query($conn,"SELECT * FROM events WHERE id='$id'");
$row = mysqli_fetch_assoc($result);

if(isset($_POST['update']))
{
    $event_name = $_POST['event_name'];
    $category = $_POST['category'];
    $description = $_POST['description'];
    $event_date = $_POST['event_date'];
    $venue = $_POST['venue'];
    $coordinator = $_POST['coordinator'];

    if($_FILES['image']['name']!="")
    {
        $image = $_FILES['image']['name'];
        $temp = $_FILES['image']['tmp_name'];

        move_uploaded_file($temp,"../images/".$image);

        mysqli_query($conn,"UPDATE events SET
        event_name='$event_name',
        category='$category',
        description='$description',
        event_date='$event_date',
        venue='$venue',
        coordinator='$coordinator',
        image='$image'
        WHERE id='$id'");
    }
    else
    {
        mysqli_query($conn,"UPDATE events SET
        event_name='$event_name',
        category='$category',
        description='$description',
        event_date='$event_date',
        venue='$venue',
        coordinator='$coordinator'
        WHERE id='$id'");
    }

    echo "<script>
    alert('Event Updated Successfully');
    window.location='events.php';
    </script>";
}
?>

<!DOCTYPE html>
<html>
<head>

<title>Edit Event</title>

<style>

body{
font-family:Arial;
background:#eef2f7;
}

.container{

width:600px;
margin:40px auto;
background:white;
padding:30px;
border-radius:10px;
box-shadow:0 5px 15px rgba(0,0,0,.2);

}

h2{
text-align:center;
color:#0d47a1;
}

input,select,textarea{

width:100%;
padding:12px;
margin:10px 0;

}

button{

width:100%;
padding:12px;
background:#0d47a1;
color:white;
border:none;
font-size:18px;
cursor:pointer;

}

button:hover{

background:#1565c0;

}

img{

width:150px;
margin-top:10px;

}

</style>

</head>

<body>

<div class="container">

<h2>Edit Event</h2>

<form method="POST" enctype="multipart/form-data">

<input type="text" name="event_name" value="<?php echo $row['event_name']; ?>" required>

<select name="category">

<option <?php if($row['category']=="Technical") echo "selected"; ?>>Technical</option>

<option <?php if($row['category']=="Cultural") echo "selected"; ?>>Cultural</option>

<option <?php if($row['category']=="Sports") echo "selected"; ?>>Sports</option>

<option <?php if($row['category']=="Workshop") echo "selected"; ?>>Workshop</option>

</select>

<textarea name="description" rows="5"><?php echo $row['description']; ?></textarea>

<input type="date" name="event_date" value="<?php echo $row['event_date']; ?>">

<input type="text" name="venue" value="<?php echo $row['venue']; ?>">

<input type="text" name="coordinator" value="<?php echo $row['coordinator']; ?>">

<p>Current Image:</p>

<img src="../images/<?php echo $row['image']; ?>">

<input type="file" name="image">

<button type="submit" name="update">Update Event</button>

</form>

</div>

</body>

</html>