<?php
// 1. Get values using null coalescing to avoid undefined warnings
$name = $_POST["name"];
$email = $_POST["email"];
$phonenumber = $_POST["phone"];

// 2. Validate
if (empty($name)) echo "Name is empty <br>";
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) echo "Email is invalid <br>";
if (!is_numeric($phonenumber)) echo "Invalid phone number <br>";

echo "Value received : $name $email $phonenumber <br>";

$folder = "uploads/";
if (!is_dir($folder)) mkdir($folder, 0777, true);

// 3. Fix: Use "Myfile" (uppercase M) to match your HTML
if (isset($_FILES["Myfile"]) && $_FILES["Myfile"]["error"] === 0) {
    
    $allowedtypes = ["jpg", "jpeg", "png", "gif", "webp"];
    $extension = strtolower(pathinfo($_FILES["Myfile"]["name"], PATHINFO_EXTENSION));

    if (!in_array($extension, $allowedtypes)) {
        echo "Error: Only JPG, JPEG, PNG, GIF, and WEBP images are allowed.";
    } elseif ($_FILES["Myfile"]["size"] > (20 * 1024 * 1024)) {
        echo "Error: Image size must not exceed 20 MB.";
    } else {
        $newName = time() . "_" . rand(1000, 9999) . "." . $extension;
        $targetFile = $folder . $newName;

        if (move_uploaded_file($_FILES["Myfile"]["tmp_name"], $targetFile)) {
            echo "Image uploaded successfully as " . $newName;
        } else {
            echo "Upload failed.";
        }
    }
} else {
    echo "No file selected or upload error code: " . ($_FILES["Myfile"]["error"] ?? 'N/A');
}
?>