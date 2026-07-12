<?php
// =========================================================
// DELETE.PHP
// =========================================================
// This file deletes ONE record from the conversion_history
// table, based on the ID sent to it.
// It is called from script.js using a simple GET request
// (the browser just visits this URL with the id attached).
// =========================================================

// Include the database connection
include "db.php";

// Check if an ID was actually sent
if (isset($_GET['id'])) {

    // Make sure the ID is a whole number (basic security step)
    $id = intval($_GET['id']);

    // -----------------------------------------------------------
    // Delete Record
    // -----------------------------------------------------------
    $deleteQuery = "DELETE FROM conversion_history WHERE id = ?";
    $stmt = mysqli_prepare($conn, $deleteQuery);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}

// Go back to the history section on the homepage
header("Location: index.php#history");
exit();
?>
