<?php

include "../config/database.php";


$id=$_GET['id'];


mysqli_query(
$conn,
"DELETE FROM books WHERE id=$id"
);



header("location:view.php");


?>