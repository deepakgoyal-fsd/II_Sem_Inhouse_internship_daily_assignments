<?php
include("session_check.php");
?>
<!DOCTYPE html>
<html>
<head>
<title>Dashboard</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Welcome Admin</h1>
        <p>Logged in as :
            <b><?php echo $_SESSION['admin']; ?></b>
        </p>
        <br>
        <a href="display.php">Manage Students</a>
        <br>
        <a href="logout.php">Logout</a>
    </div>
</body>
</html>