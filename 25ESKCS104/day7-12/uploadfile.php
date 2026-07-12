<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $allowed_types = [
        "image/jpeg",
        "image/png",
        "image/gif"
    ];

    $file = $_FILES['photo'];

    // Basic validation

    if (!in_array($file['type'], $allowed_types)) {

        die("Error: Only JPG, PNG, GIF allowed.");

    }

    if ($file['size'] > 2 * 1024 * 1024) {

        die("Error: File too large (max 2MB).");

    }

    // Generate unique filename

    $ext = pathinfo($file['name'], PATHINFO_EXTENSION);

    $filename = uniqid("student_") . "." . $ext;

    $dest = "uploads/" . $filename;

    if (move_uploaded_file($file['tmp_name'], $dest)) {

        // Save $filename into DB

        echo "Upload successful";

    }

}
?>