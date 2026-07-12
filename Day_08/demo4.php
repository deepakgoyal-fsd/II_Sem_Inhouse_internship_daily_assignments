<?php
date_default_timezone_set('Asia/Kolkata');

echo "Page loaded at: " . date("H:i:s") . " on " . date("d-M-Y");
echo "<br><br>";

$visitorName = $_POST['name'] ?? "Guest";
echo "Welcome, $visitorName!";

if ($visitorName !== "Guest") {
    echo " (glad you're back)";
}
?>
