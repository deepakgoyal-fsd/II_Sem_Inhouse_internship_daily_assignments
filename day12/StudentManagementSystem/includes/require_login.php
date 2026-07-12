<?php
/**
 * Include this file as the VERY FIRST LINE of any protected page
 * (before any HTML output). It starts the session and redirects
 * unauthenticated visitors to a friendly Access Denied page.
 */

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (empty($_SESSION['user_id'])) {
    header('Location: access_denied.php');
    exit;
}
