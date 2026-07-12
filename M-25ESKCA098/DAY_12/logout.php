<?php
session_start();
session_destroy();

if (isset($_GET['type']) && $_GET['type'] === 'admin') {
    header("Location: admin_login.php");
} else {
    header("Location: student_login.php");
}
exit();
?>