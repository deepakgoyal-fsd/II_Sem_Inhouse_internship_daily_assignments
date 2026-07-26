<?php
// db.php - Database connection (PDO)
declare(strict_types=1);

define('DB_HOST', 'localhost');
define('DB_NAME', 'hackathon_2026');
define('DB_USER', 'root');
define('DB_PASS', '');

try {
    $pdo = new PDO(
        'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8mb4',
        DB_USER,
        DB_PASS,
        [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ]
    );
} catch (PDOException $e) {
    die('Database connection failed: ' . htmlspecialchars($e->getMessage()));
}

const SEAT_CAP = 100;

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function clean(string $v): string {
    return trim(strip_tags($v));
}

function seatsBooked(PDO $pdo): int {
    return (int) $pdo->query('SELECT COUNT(*) FROM registrations')->fetchColumn();
}

function seatsLeft(PDO $pdo): int {
    return max(0, SEAT_CAP - seatsBooked($pdo));
}
