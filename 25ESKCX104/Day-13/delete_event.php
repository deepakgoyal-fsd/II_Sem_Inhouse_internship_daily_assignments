<?php

session_start();

if(!isset($_SESSION["admin_id"])){
    header("Location:admin_login.php");
    exit();
}

include("db_connect.php");

$id=$_GET["id"];

$query="DELETE FROM events WHERE id='$id'";

if(mysqli_query($conn,$query)){

echo "<script>

alert('Event Deleted Successfully');

window.location='view_events.php';

</script>";

}

else{

echo mysqli_error($conn);

}

?>