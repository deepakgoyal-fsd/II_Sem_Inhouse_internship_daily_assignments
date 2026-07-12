<?php
/**
 * Database connection for the Student Management System.
 * Update the credentials below to match your local XAMPP / MySQL setup.
 */

$DB_HOST = 'localhost';
$DB_USER = 'root';
$DB_PASS = '';
$DB_NAME = 'student_management';

$conn = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);

if (!$conn) {
    error_log('MySQL connection failed: ' . mysqli_connect_error());
    die('
        <div style="font-family: sans-serif; max-width:600px; margin:60px auto; padding:20px;
                    border:1px solid #f1aeb5; background:#f8d7da; color:#842029; border-radius:8px;">
            <strong>Database connection failed.</strong><br>
            Please make sure MySQL is running and that a database named
            <code>student_management</code> exists (see sql/schema.sql).
        </div>
    ');
}

// XSS-safe output helper, used across all pages
function h($value) {
    return htmlspecialchars($value ?? '', ENT_QUOTES, 'UTF-8');
}

// Escapes $text for safe output, then wraps any case-insensitive match of
// $term in <mark> tags. Both sides are escaped first, so this never
// reintroduces unescaped user input into the page.
function highlight($text, $term) {
    $escaped = h($text);
    $term = trim((string) $term);
    if ($term === '') {
        return $escaped;
    }
    $escapedTerm = h($term);
    return preg_replace('/(' . preg_quote($escapedTerm, '/') . ')/i', '<mark>$1</mark>', $escaped);
}
