<?php
// =========================================================
// CLEAR.PHP
// =========================================================
// This file deletes ALL records from the conversion_history
// table. It runs when the user clicks "Clear All History".
// =========================================================

// Include the database connection
include "db.php";

// -----------------------------------------------------------
// Delete Record(s) - all rows in the table
// -----------------------------------------------------------
$truncateQuery = "TRUNCATE TABLE conversion_history";
mysqli_query($conn, $truncateQuery);

// Go back to the history section on the homepage
header("Location: index.php#history");
exit();
?>
