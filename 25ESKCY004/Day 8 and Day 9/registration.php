<?php
include('db_connect.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $first = trim($_POST['first'] ?? '');
    $last = trim($_POST['last'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $repassword = $_POST['repassword'] ?? '';
    $mobile = trim($_POST['mobile'] ?? '');
    $gender = $_POST['gender'] ?? '';

    $errors = [];

    if ($first === '' || $last === '') {
        $errors[] = 'First name and last name are required.';
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Please enter a valid email address.';
    }

    if ($password === '') {
        $errors[] = 'Password is required.';
    } elseif ($password !== $repassword) {
        $errors[] = 'Passwords do not match.';
    }

    if (!preg_match('/^\d{10}$/', $mobile)) {
        $errors[] = 'Contact number must be exactly 10 digits.';
    }

    if (!in_array($gender, ['male', 'female', 'other'], true)) {
        $errors[] = 'Please select a valid gender.';
    }

    if (!isset($_FILES['myfile']) || $_FILES['myfile']['error'] !== UPLOAD_ERR_OK) {
        $errors[] = 'Please upload a valid image file.';
    }

    if (empty($errors)) {
        $allowedTypes = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
        $extension = strtolower(pathinfo($_FILES['myfile']['name'], PATHINFO_EXTENSION));
        $maxSize = 20 * 1024 * 1024;

        if (!in_array($extension, $allowedTypes, true)) {
            $errors[] = 'Only JPG, JPEG, PNG, GIF and WEBP images are allowed.';
        }

        if ($_FILES['myfile']['size'] > $maxSize) {
            $errors[] = 'Image size must not exceed 20 MB.';
        }
    }

    if (empty($errors)) {
        $uploadDir = __DIR__ . '/upload/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        $newFileName = time() . '_' . rand(1000, 9999) . '.' . $extension;
        $targetFile = $uploadDir . $newFileName;

        if (!move_uploaded_file($_FILES['myfile']['tmp_name'], $targetFile)) {
            $errors[] = 'Failed to save uploaded file.';
        }
    }

    if (empty($errors)) {
        $first = mysqli_real_escape_string($conn, $first);
        $last = mysqli_real_escape_string($conn, $last);
        $email = mysqli_real_escape_string($conn, $email);
        $mobile = mysqli_real_escape_string($conn, $mobile);
        $gender = mysqli_real_escape_string($conn, $gender);
        $imagePath = mysqli_real_escape_string($conn, 'upload/' . $newFileName);
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (first_name, last_name, email, password, mobile, gender, image_path)
                VALUES ('$first', '$last', '$email', '$passwordHash', '$mobile', '$gender', '$imagePath')";

        if (mysqli_query($conn, $sql)) {
            echo 'Registration successful.';
        } else {
            echo 'Database error: ' . mysqli_error($conn);
        }
    } else {
        foreach ($errors as $error) {
            echo '<p>' . htmlspecialchars($error) . '</p>';
        }
    }
}
?>

