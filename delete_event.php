<?php
session_start();

if(!isset($_SESSION['admin']))
{
    header("Location: ../login.php");
    exit();
}

include("../includes/db.php");

if(isset($_GET['id']))
{
    $id = $_GET['id'];

    // Get image name
    $query = mysqli_query($conn,"SELECT image FROM events WHERE id='$id'");
    $row = mysqli_fetch_assoc($query);

    // Delete image from folder
    if($row)
    {
        $image = "../images/".$row['image'];

        if(file_exists($image))
        {
            unlink($image);
        }
    }

    // Delete event from database
    $delete = mysqli_query($conn,"DELETE FROM events WHERE id='$id'");

    if($delete)
    {
        echo "<script>
        alert('Event Deleted Successfully!');
        window.location='events.php';
        </script>";
    }
    else
    {
        echo "<script>
        alert('Failed to Delete Event!');
        window.location='events.php';
        </script>";
    }
}
?>