<?php
session_start();
require_once 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['profile_pic'])) {
    $file = $_FILES['profile_pic'];
    
    // File properties
    $fileName = $file['name'];
    $fileTmpName = $file['tmp_name'];
    $fileSize = $file['size'];
    $fileError = $file['error'];

    // Get file extension safely
    $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
    $allowed = ['jpg', 'jpeg', 'png', 'webp'];

    if (in_array($fileExt, $allowed)) {
        if ($fileError === 0) {
            if ($fileSize < 2000000) { // Limit to 2MB
                
                // Create a completely unique name for the image
                $newFileName = "profile_" . $_SESSION['user_id'] . "_" . time() . "." . $fileExt;
                
                // Define where to save the images (make sure an 'uploads' folder exists!)
                $fileDestination = 'uploads/' . $newFileName;

                if (move_uploaded_file($fileTmpName, $fileDestination)) {
                    
                    // Update database with the path to the file
                    $stmt = $pdo->prepare("UPDATE users SET profile_image = :img WHERE id = :id");
                    $stmt->execute([
                        'img' => $fileDestination,
                        'id' => $_SESSION['user_id']
                    ]);

                    $_SESSION['success'] = "Profile picture updated!";
                    header("Location: updateprofile.php");
                    exit();
                    
                } else {
                    $_SESSION['error'] = "Failed to move uploaded file.";
                }
            } else {
                $_SESSION['error'] = "Your file is too large (Max 2MB).";
            }
        } else {
            $_SESSION['error'] = "There was an error uploading your file.";
        }
    } else {
        $_SESSION['error'] = "Invalid file type. Allowed: JPG, JPEG, PNG, WEBP.";
    }
    header("Location: updateprofile.php");
    exit();
}