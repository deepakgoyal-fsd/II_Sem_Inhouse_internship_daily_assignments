<?php
include 'db.php';

if(isset($_GET['id']))
{
    $id = $_GET['id'];

    // Get photo name before deleting
    $result = mysqli_query($conn,"SELECT photo FROM students WHERE id='$id'");
    $row = mysqli_fetch_assoc($result);

    if($row)
    {
        // Delete uploaded photo except default image
        if($row['photo'] != "default.png" && file_exists("uploads/".$row['photo']))
        {
            unlink("uploads/".$row['photo']);
        }

        // Delete student record
        mysqli_query($conn,"DELETE FROM students WHERE id='$id'");
    }
}

// Redirect back
header("Location: students.php");
exit();
?>