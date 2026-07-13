<?php

include('db_connect.php');

<?php

$name = $_POST["name"] ?? "";
$email = $_POST["email"] ?? "";
$phoneNumber = $_POST["phoneNumber"] ?? "";
$DOB = $_POST["DOB"] ?? "";
$pwdpassword = $_POST["pwdpassword"] ?? "";
$pwdconfirmpassword = $_POST["pwdconfirmpassword"] ?? "";

if ($pwdpassword !== $pwdconfirmpassword) {
    echo "Passwords do not match.";
    exit;
}

if (empty($name)) {
    echo "Name is empty <br>";
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Email is invalid <br>";
    exit;
}

if (!ctype_digit($phoneNumber) || strlen($phoneNumber) != 10) {
    echo "Phone number must be exactly 10 digits <br>";
    exit;
}

if (empty($DOB)) {
    echo "Date of birth is empty <br>";
    exit;
}

    echo "Date of birth is empty <br>";
    exit;

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
 Name : $name <br>
 Email : $email <br>
 Phone number : $phoneNumber <br>
 Department : $branch <br>
 Date of birth : $DOB <br>
 Password : $pwdpassword <br>
 Confirm password : $pwdconfirmpassword <br>"; 

if ($uploadedImage !== "") {
    echo " Image : <br><img src='" . htmlspecialchars($uploadedImage, ENT_QUOTES, 'UTF-8') . "' alt='Uploaded image' style='max-width:200px;'><br>";
}
?>