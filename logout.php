<?php
session_start();

// Destroy all session data
session_destroy();

// Redirect to Login Page
header("Location: ../login.php");
exit();
?>