<?php

session_start();

// Guard clause - protect this page
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit(); // Always exit after redirect
}

// Safe to render the page now

?>

<!DOCTYPE html>

<html>

<body>

Dashboard content here...

</body>

</html>