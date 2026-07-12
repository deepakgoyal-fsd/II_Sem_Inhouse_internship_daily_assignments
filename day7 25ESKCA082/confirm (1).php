<?php

$errors = [];

$name = trim($_POST['name'] ?? '');
$email = trim($_POST['email'] ?? '');
$mobile = trim($_POST['mobile'] ?? '');
$gender = $_POST['gender'] ?? '';
$course = $_POST['course'] ?? '';
$address = trim($_POST['address'] ?? '');

if (!preg_match('/^[A-Za-z ]+$/', $name)) {
    $errors[] = 'Name should not contain numbers.';
}

if (strlen($address) < 10) {
    $errors[] = 'Address must be minimum 10 characters.';
}

if ($gender === '') {
    $errors[] = 'Please select gender.';
}

$uploadDir = __DIR__ . '/uploads';
if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}

$photoName = '';

if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
    $fileTmp = $_FILES['photo']['tmp_name'];
    $fileName = basename($_FILES['photo']['name']);
    $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
    $allowedTypes = ['jpg', 'jpeg', 'png', 'webp'];

    if (!in_array($fileExt, $allowedTypes, true)) {
        $errors[] = 'Only JPG, PNG, and WEBP images are allowed.';
    } elseif ($_FILES['photo']['size'] > 2 * 1024 * 1024) {
        $errors[] = 'Photo size must be less than 2MB.';
    } else {
        $photoName = time() . '_' . preg_replace('/[^A-Za-z0-9._-]/', '_', $fileName);
        $targetPath = $uploadDir . '/' . $photoName;

        if (!move_uploaded_file($fileTmp, $targetPath)) {
            $errors[] = 'Photo upload failed.';
        }
    }
} else {
    $errors[] = 'Please select a photo.';
}

if (count($errors) > 0) {
    echo "<div style='width:500px;margin:auto;background:#ffdddd;padding:20px;border:1px solid red'>";
    echo '<h3>Errors</h3>';

    foreach ($errors as $e) {
        echo "<p>$e</p>";
    }

    echo '</div>';
    exit();
}

?>

<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header bg-success text-white">
                Registration Successful
            </div>
            <div class="card-body">
                <img src="uploads/<?php echo $photoName; ?>" width="150" class="rounded-circle">

                <h4>Name : <?php echo htmlspecialchars($name); ?></h4>
                <h4>Email : <?php echo htmlspecialchars($email); ?></h4>
                <h4>Mobile : <?php echo htmlspecialchars($mobile); ?></h4>
                <h4>Gender : <?php echo htmlspecialchars($gender); ?></h4>
                <h4>Course : <?php echo htmlspecialchars($course); ?></h4>
                <h4>Address : <?php echo htmlspecialchars($address); ?></h4>
            </div>
        </div>
    </div>
</body>
</html>