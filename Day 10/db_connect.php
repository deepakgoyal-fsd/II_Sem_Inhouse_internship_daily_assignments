<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "student_management";

$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
}

$serverInfo = mysqli_get_host_info($conn);
?>
<div class="alert alert-success alert-dismissible fade show m-3 shadow-sm border-0" role="alert">
    <strong><i class="fas fa-check-circle"></i> Connected to MySQL!</strong>
    <span class="ms-2 opacity-75">Server: <?= htmlspecialchars($serverInfo) ?></span>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>