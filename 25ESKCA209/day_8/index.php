<?php

$targetDir = "uploads/";

// Create uploads directory if it doesn't exist
if (!is_dir($targetDir)) {
    mkdir($targetDir, 0755, true);
}

if (isset($_FILES["photo"])) {

    $maxSize = 20 * 1024 * 1024; // 20 MB
    
    $allowedTypes = [
        'image/jpeg',
        'image/png',
        'image/gif',
        'image/webp',
        'image/bmp',
        'image/x-icon',
        'image/tiff'
    ];

    if ($_FILES["photo"]["error"] !== UPLOAD_ERR_OK) {
        die("Upload failed.");
    }

    if ($_FILES["photo"]["size"] > $maxSize) {
        die("File must be under 20 MB.");
    }

    // Verify MIME type
    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $mime = finfo_file($finfo, $_FILES["photo"]["tmp_name"]);
    finfo_close($finfo);

    if (!in_array($mime, $allowedTypes)) {
        die("Only image files are allowed.");
    }

    // Generate unique filename
    $extension = pathinfo($_FILES["photo"]["name"], PATHINFO_EXTENSION);
    $newFileName = uniqid("img_", true) . "." . strtolower($extension);

    $targetFile = $targetDir . $newFileName;

    if (move_uploaded_file($_FILES["photo"]["tmp_name"], $targetFile)) {
        echo "Upload successful!<br>";
        echo "Saved as: " . htmlspecialchars($newFileName);
    } else {
        echo "Failed to upload file.";
    }

} else {
    echo "No file selected.";
}
?>