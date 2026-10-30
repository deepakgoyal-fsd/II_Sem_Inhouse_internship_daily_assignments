<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: 403.php");
    exit();
}
?>