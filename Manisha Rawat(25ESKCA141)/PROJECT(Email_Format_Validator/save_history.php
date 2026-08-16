<?php

/*======================================================
        EMAIL VALIDATOR PRO
        SAVE HISTORY
======================================================*/

include "config.php";

if ($_SERVER["REQUEST_METHOD"] != "POST") {
    exit;
}

// Receive data
$email      = $_POST["email"] ?? "";
$username   = $_POST["username"] ?? "";
$domain     = $_POST["domain"] ?? "";
$extension  = $_POST["extension"] ?? "";
$provider   = $_POST["provider"] ?? "";
$quality    = $_POST["quality"] ?? 0;
$security   = $_POST["security"] ?? 0;
$status     = $_POST["status"] ?? "";

// Insert into database
$sql = "INSERT INTO history
(email, username, domain, extension, provider, quality, security, status)
VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);

$stmt->bind_param(
    "sssssdds",
    $email,
    $username,
    $domain,
    $extension,
    $provider,
    $quality,
    $security,
    $status
);

if ($stmt->execute()) {

    echo "Saved";

} else {

    echo "Error";

}

$stmt->close();
$conn->close();

?>