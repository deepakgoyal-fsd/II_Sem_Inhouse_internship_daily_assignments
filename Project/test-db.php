<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once 'config.php';

echo "Testing database connection...\n\n";

$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS);

if ($mysqli->connect_error) {
    echo "Connection failed: " . $mysqli->connect_error;
    exit;
}

echo "✓ MySQL Connected\n";

$mysqli->select_db(DB_NAME);
if ($mysqli->error) {
    echo "Database select error: " . $mysqli->error;
    exit;
}

echo "✓ Database Selected: " . DB_NAME . "\n";

$result = $mysqli->query("SHOW TABLES");
if ($result) {
    echo "✓ Tables found: ";
    $tables = [];
    while ($row = $result->fetch_row()) {
        $tables[] = $row[0];
    }
    echo implode(", ", $tables) . "\n";
}

$count = $mysqli->query("SELECT COUNT(*) as cnt FROM feedback")->fetch_assoc()['cnt'];
echo "✓ Feedback rows in database: " . $count . "\n";

$count_users = $mysqli->query("SELECT COUNT(*) as cnt FROM users")->fetch_assoc()['cnt'];
echo "✓ Users in database: " . $count_users . "\n";

echo "\nDatabase is working correctly!";
