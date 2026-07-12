<?php
// =========================================================
// CONVERT.PHP
// =========================================================
// This file runs when the user clicks the "Convert" button.
// It takes the date, time, and time zones from the form,
// converts the time using PHP's built-in DateTime classes,
// saves the result into the database, and sends the user
// back to the homepage with the result shown.
// =========================================================

// Include the database connection
include "db.php";

// Only run this code if the form was submitted using POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // -----------------------------------------------------------
    // Validation (Server Side)
    // Even though we validate with JavaScript too, we ALWAYS
    // validate again on the server, because JavaScript can be
    // bypassed by the user.
    // -----------------------------------------------------------
    $inputDate = $_POST['inputDate'];
    $inputTime = $_POST['inputTime'];
    $fromZone  = $_POST['fromTimezone'];
    $toZone    = $_POST['toTimezone'];

    if (empty($inputDate) || empty($inputTime) || empty($fromZone) || empty($toZone)) {
        // If any field is missing, send the user back with an error
        header("Location: index.php?error=1");
        exit();
    }

    // -----------------------------------------------------------
    // Convert Time
    // -----------------------------------------------------------
    // Combine the date and time into one string, e.g. "2026-07-12 10:00"
    $dateTimeString = $inputDate . " " . $inputTime;

    // Create a DateTime object using the "From" time zone
    $fromDateTimeZone = new DateTimeZone($fromZone);
    $dateTimeObj = new DateTime($dateTimeString, $fromDateTimeZone);

    // Change the time zone of that object to the "To" time zone
    // (This automatically recalculates the correct date & time)
    $toDateTimeZone = new DateTimeZone($toZone);
    $dateTimeObj->setTimezone($toDateTimeZone);

    // Format the final converted date and time nicely
    $convertedDateTime = $dateTimeObj->format("Y-m-d H:i:s");

    // -----------------------------------------------------------
    // Insert into Database
    // -----------------------------------------------------------
    // We use a prepared statement to keep it safe from SQL Injection
    $insertQuery = "INSERT INTO conversion_history 
                    (input_date, input_time, from_timezone, to_timezone, converted_datetime) 
                    VALUES (?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($conn, $insertQuery);
    mysqli_stmt_bind_param($stmt, "sssss", $inputDate, $inputTime, $fromZone, $toZone, $convertedDateTime);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    // -----------------------------------------------------------
    // Send the user back to the homepage along with the result
    // We pass the result using the URL (GET parameters) so that
    // index.php can display it, without needing AJAX.
    // -----------------------------------------------------------
    $resultDate = $dateTimeObj->format("Y-m-d");
    $resultTime = $dateTimeObj->format("h:i A");

    header("Location: index.php?result=1"
        . "&date=" . urlencode($resultDate)
        . "&time=" . urlencode($resultTime)
        . "&zone="  . urlencode($toZone)
        . "#converter");
    exit();

} else {
    // If someone tries to open this file directly without submitting the form
    header("Location: index.php");
    exit();
}
?>
