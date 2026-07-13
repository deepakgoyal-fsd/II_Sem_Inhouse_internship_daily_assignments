<?php

$txtName = $_POST["txtName"] ?? "";
$txtEmail = $_POST["txtEmail"] ?? "";
$txtPhno = $_POST["txtPhno"] ?? "";
$txtGender = $_POST["txtGender"] ?? "";
$txtDepartment = $_POST["txtDepartment"] ?? "";
$myFile = $_POST["myFile"] ?? "";
$txtDob = $_POST["txtDob"] ?? "";
$txtPassword = $_POST["txtPassword"] ?? "";
$txtConfirmpassword = $_POST["txtConfirmpassword"] ?? "";

if ($txtPassword !== $txtConfirmpassword) {
    echo "Passwords do not match.";
    exit;
}

if (empty($txtName)) {
    echo "Name is empty <br>";
    exit;
}

if (!filter_var($txtEmail, FILTER_VALIDATE_EMAIL)) {
    echo "Email is invalid <br>";
    exit;
}

if (!ctype_digit($txtPhno) || strlen($txtPhno) != 10) {
    echo "Phone number must be exactly 10 digits <br>";
    exit;
}

if (empty($txtDepartment)) {
    echo "Department is empty <br>";
    exit;
}

if (empty($txtDob)) {
    echo "Date of birth is empty <br>";
    exit;
}

$folder = "upload/";
$uploadedImage = "";

if (!is_dir($folder)) {
    mkdir($folder, 0777, true);
}

if (isset($_FILES["myFile"]) && $_FILES["myFile"]["error"] === UPLOAD_ERR_OK) {
    $allowedTypes = ["jpg", "jpeg", "png", "gif", "webp"];
    $extension = strtolower(pathinfo($_FILES["myFile"]["name"], PATHINFO_EXTENSION));
    $maxSize = 20 * 1024 * 1024;

    if (!in_array($extension, $allowedTypes, true)) {
        die("Only JPG, JPEG, PNG, GIF and WEBP are allowed.");
    }

    if ($_FILES["myFile"]["size"] > $maxSize) {
        die("Image size must not exceed 20 MB.");
    }

    $newName = time() . "_" . rand(1000, 9999) . "." . $extension;
    $targetFile = $folder . $newName;

    if (move_uploaded_file($_FILES["myFile"]["tmp_name"], $targetFile)) {
        $uploadedImage = $targetFile;
        echo "Image uploaded successfully<br>";
    } else {
        echo "Image upload failed";
    }
} elseif (isset($_FILES["myFile"]["error"]) && $_FILES["myFile"]["error"] !== UPLOAD_ERR_NO_FILE) {
    echo "There was an error uploading the file.";
}

echo "Registration successful: <br>
 Name : $txtName <br>
 Email : $txtEmail <br>
 Image : $myFile <br>
 Phone number : $txtPhno <br>
 Gender : $txtGender <br>
 Department : $txtDepartment <br>
 Date of birth : $txtDob <br>
 Password : $txtPassword <br> ; 

if ($uploadedImage !== "") {
    echo " Image : <br><img src='" . htmlspecialchars($uploadedImage, ENT_QUOTES, 'UTF-8') . "' alt='Uploaded image' style='max-width:200px;'><br>";
}
?>