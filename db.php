<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbName = "hostel_db";

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$conn = new mysqli($host, $user, $pass);
if ($conn->connect_error) {
    die("Database Connection Failed: " . $conn->connect_error);
}

$conn->set_charset('utf8mb4');


$conn->query("CREATE DATABASE IF NOT EXISTS `$dbName` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");
$conn->select_db($dbName);


$conn->query("CREATE TABLE IF NOT EXISTS users (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin','student') NOT NULL DEFAULT 'student',
    phone_number VARCHAR(50) DEFAULT NULL,
    fathers_name VARCHAR(255) DEFAULT NULL,
    mothers_name VARCHAR(255) DEFAULT NULL,
    branch VARCHAR(255) DEFAULT NULL,
    permanent_address TEXT DEFAULT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");


$conn->query("CREATE TABLE IF NOT EXISTS rooms (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    room_number VARCHAR(50) NOT NULL,
    room_type VARCHAR(100) NOT NULL,
    location VARCHAR(255) DEFAULT NULL,
    fees_per_sem DECIMAL(10,2) NOT NULL DEFAULT 0,
    available_beds INT UNSIGNED NOT NULL DEFAULT 0,
    image_path VARCHAR(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");


$conn->query("CREATE TABLE IF NOT EXISTS room_requests (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT UNSIGNED NOT NULL,
    room_id INT UNSIGNED NOT NULL,
    roll_no VARCHAR(100) NOT NULL,
    stay_duration ENUM('Semester','Month') NOT NULL DEFAULT 'Semester',
    status ENUM('Pending','Approved','Rejected') NOT NULL DEFAULT 'Pending',
    payment_status ENUM('Unpaid','Paid') NOT NULL DEFAULT 'Unpaid',
    final_amount DECIMAL(10,2) NOT NULL DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (room_id) REFERENCES rooms(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");


$conn->query("ALTER TABLE users ADD COLUMN IF NOT EXISTS phone_number VARCHAR(50) DEFAULT NULL");
$conn->query("ALTER TABLE users ADD COLUMN IF NOT EXISTS fathers_name VARCHAR(255) DEFAULT NULL");
$conn->query("ALTER TABLE users ADD COLUMN IF NOT EXISTS mothers_name VARCHAR(255) DEFAULT NULL");
$conn->query("ALTER TABLE users ADD COLUMN IF NOT EXISTS branch VARCHAR(255) DEFAULT NULL");
$conn->query("ALTER TABLE users ADD COLUMN IF NOT EXISTS permanent_address TEXT DEFAULT NULL");
$conn->query("ALTER TABLE users ADD COLUMN IF NOT EXISTS avatar_path VARCHAR(255) DEFAULT NULL");
$conn->query("ALTER TABLE room_requests ADD COLUMN IF NOT EXISTS stay_duration ENUM('Semester','Month') NOT NULL DEFAULT 'Semester'");
$conn->query("ALTER TABLE room_requests ADD COLUMN IF NOT EXISTS payment_status ENUM('Unpaid','Paid') NOT NULL DEFAULT 'Unpaid'");
$conn->query("ALTER TABLE room_requests ADD COLUMN IF NOT EXISTS final_amount DECIMAL(10,2) NOT NULL DEFAULT 0");
$conn->query("ALTER TABLE rooms ADD COLUMN IF NOT EXISTS location VARCHAR(255) DEFAULT NULL");
$conn->query("ALTER TABLE rooms ADD COLUMN IF NOT EXISTS fees_per_sem DECIMAL(10,2) NOT NULL DEFAULT 0");
$conn->query("ALTER TABLE rooms ADD COLUMN IF NOT EXISTS available_beds INT UNSIGNED NOT NULL DEFAULT 0");
$conn->query("ALTER TABLE rooms ADD COLUMN IF NOT EXISTS image_path VARCHAR(255) DEFAULT NULL");

// Useful indexes keep the dashboard and filtered request lists responsive as data grows.
// Older MySQL releases do not support IF NOT EXISTS for indexes, so ignore an existing-index error.
try { $conn->query("CREATE INDEX idx_requests_user_status ON room_requests (user_id, status)"); } catch (mysqli_sql_exception $e) {}
try { $conn->query("CREATE INDEX idx_requests_status_created ON room_requests (status, created_at)"); } catch (mysqli_sql_exception $e) {}


$conn->query("UPDATE rooms SET available_beds = COALESCE(available_beds, 0) WHERE available_beds IS NULL");
$conn->query("UPDATE rooms SET fees_per_sem = COALESCE(fees_per_sem, 0) WHERE fees_per_sem IS NULL");
$conn->query("UPDATE rooms SET image_path = 'single_premium.jpg' WHERE room_type LIKE '%Single%' AND (image_path IS NULL OR image_path = '')");
$conn->query("UPDATE rooms SET image_path = 'double_ac.jpg' WHERE room_type LIKE '%2-Bed%' AND (image_path IS NULL OR image_path = '')");
$conn->query("UPDATE rooms SET image_path = 'triple_ac.jpg' WHERE room_type LIKE '%3-Bed%' AND (image_path IS NULL OR image_path = '')");
$conn->query("UPDATE rooms SET image_path = 'double_nonac.jpg' WHERE room_type LIKE '%4-Bed%' AND (image_path IS NULL OR image_path = '')");


$roomCount = $conn->query("SELECT COUNT(*) as count FROM rooms")->fetch_assoc()['count'];
if ($roomCount == 0) {
    $conn->query("INSERT INTO rooms (room_number, room_type, location, fees_per_sem, available_beds, image_path) VALUES
        ('101', '4-Bed Dorm', 'Ground Floor', 25000.00, 4, 'double_nonac.jpg'),
        ('102', '3-Bed Dorm', 'Ground Floor', 27000.00, 3, 'triple_ac.jpg'),
        ('201', '2-Bed Deluxe', 'First Floor', 32000.00, 2, 'double_ac.jpg'),
        ('202', 'Single Premium', 'First Floor', 40000.00, 1, 'single_premium.jpg')");
}
?>
