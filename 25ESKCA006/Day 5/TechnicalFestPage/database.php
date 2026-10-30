<?php
/* =====================================================================
   PRAVAH 2026 — DATABASE.PHP
   Reusable MySQL connection file using MySQLi (Object-Oriented style).
   Include this file in any PHP script that needs database access:
       require_once "database.php";
   ===================================================================== */

/* ---------------------------------------------------------------------
   1. DATABASE CONNECTION CREDENTIALS
   Update these values to match your local/server MySQL setup.
   --------------------------------------------------------------------- */
$host     = "localhost";   // Database server address
$username = "root";        // MySQL username
$password = "";            // MySQL password
$database = "pravah2026";  // Database name

/* ---------------------------------------------------------------------
   2. CREATE THE CONNECTION
   The @ symbol suppresses PHP's default warning output so we can
   handle the error ourselves in a clean, controlled way below.
   --------------------------------------------------------------------- */
$conn = @new mysqli($host, $username, $password, $database);

/* ---------------------------------------------------------------------
   3. HANDLE CONNECTION ERRORS
   If the connection fails, stop script execution immediately and
   show a clear (but safe) error message instead of a raw PHP crash.
   --------------------------------------------------------------------- */
if ($conn->connect_error) {

    // Log the detailed error for the developer (check your server logs)
    error_log("Database Connection Error: " . $conn->connect_error);

    // Show a generic, user-friendly message instead of exposing details
    die("⚠️ Unable to connect to the database right now. Please try again later.");
}

/* ---------------------------------------------------------------------
   4. SET CHARACTER SET TO UTF-8
   Ensures special characters (names, emojis, etc.) are stored and
   retrieved correctly without corruption.
   --------------------------------------------------------------------- */
$conn->set_charset("utf8mb4");

/* ---------------------------------------------------------------------
   The $conn object is now ready to use in any file that includes
   this script, e.g.:

       require_once "database.php";
       $stmt = $conn->prepare("SELECT * FROM registrations WHERE id = ?");
   --------------------------------------------------------------------- */
?>