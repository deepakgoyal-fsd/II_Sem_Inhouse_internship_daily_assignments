<?php

include("includes/auth.php");
include("includes/db.php");

$id = $_SESSION['user_id'];

mysqli_query($conn,
"UPDATE users
SET click_count = click_count + 1
WHERE id = '$id'");

$result = mysqli_query($conn,
"SELECT click_count FROM users
WHERE id='$id'");

$row = mysqli_fetch_assoc($result);

echo $row['click_count'];

?>