<?php
// Include database connection
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // 1. Sanitize text inputs
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $branch = $conn->real_escape_string($_POST['branch']);
    $cgpa = (float)$_POST['cgpa'];
    $status = 'Active'; // New students are active by default

    // 2. Handle File Upload
    $profile_photo = 'default.png'; // Default if no photo is uploaded
    
    // Check if a file was uploaded without errors
    if (isset($_FILES['profile_photo']) && $_FILES['profile_photo']['error'] == 0) {
        
        $target_dir = "uploads/";
        
        // Add a timestamp to the file name so multiple students uploading "photo.jpg" don't overwrite each other
        $file_name = time() . "_" . basename($_FILES["profile_photo"]["name"]); 
        $target_file = $target_dir . $file_name;
        
        // Move the file from the temporary server folder to our uploads folder
        if (move_uploaded_file($_FILES["profile_photo"]["tmp_name"], $target_file)) {
            $profile_photo = $file_name; // Update variable to the new filename
        }
    }

    // 3. Insert into Database
    $sql = "INSERT INTO students (name, email, branch, cgpa, profile_photo, status) 
            VALUES ('$name', '$email', '$branch', $cgpa, '$profile_photo', '$status')";

    if ($conn->query($sql) === TRUE) {
        // Redirect back to dashboard on success
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>