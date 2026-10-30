<?php
session_start();
include '../includes/config.php';

// Check if admin is logged in
if(!isset($_SESSION['admin']))
{
    header("Location: login.php");
    exit();
}

// Check if appointment ID is provided
if(isset($_GET['id']))
{
    $id = $_GET['id'];

    $sql = "DELETE FROM appointments WHERE id='$id'";

    if(mysqli_query($conn, $sql))
    {
        echo "<script>
                alert('Appointment deleted successfully!');
                window.location='appointments.php';
              </script>";
    }
    else
    {
        echo "<script>
                alert('Failed to delete appointment!');
                window.location='appointments.php';
              </script>";
    }
}
else
{
    header("Location: appointments.php");
}
?>