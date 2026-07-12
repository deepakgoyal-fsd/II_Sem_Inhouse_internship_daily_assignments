<?php include 'auth.php'; ?>
<?php
include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = intval($_POST['id']);
    $name = mysqli_real_escape_string($conn, trim($_POST['student_name'] ?? ''));
    $email = mysqli_real_escape_string($conn, trim($_POST['email'] ?? ''));
    $branch = mysqli_real_escape_string($conn, trim($_POST['college'] ?? ''));
    $cgpa = mysqli_real_escape_string($conn, trim($_POST['cgpa'] ?? ''));
    $gender = mysqli_real_escape_string($conn, trim($_POST['gender'] ?? ''));
    $status = mysqli_real_escape_string($conn, trim($_POST['status'] ?? 'Active'));
    $address = mysqli_real_escape_string($conn, trim($_POST['address'] ?? ''));

    $photo_sql = "";
    if (isset($_FILES['photo']) && $_FILES['photo']['error'] == 0) {
        $file = $_FILES['photo'];
        $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
        
        if (!in_array($file['type'], $allowed_types)) {
            $_SESSION['error'] = "Error: Only JPG, PNG, GIF allowed.";
            header("Location: edit.php?id=$id");
            exit();
        }
        
        if ($file['size'] > 2 * 1024 * 1024) {
            $_SESSION['error'] = "Error: File too large (max 2MB).";
            header("Location: edit.php?id=$id");
            exit();
        }

        $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
        $photo_name = uniqid('student_') . '.' . $ext;
        if (move_uploaded_file($file['tmp_name'], 'uploads/' . $photo_name)) {
            $photo_sql = ", photo='$photo_name'";
        }
    }

    $check = mysqli_query($conn, "SELECT id FROM students WHERE email='$email' AND id != $id");
    if (mysqli_num_rows($check) > 0) {
        $_SESSION['error'] = "Email address is already in use!";
        header("Location: edit.php?id=$id");
        exit();
    }

    $sql = "UPDATE students SET name='$name', email='$email', branch='$branch', cgpa='$cgpa', gender='$gender', address='$address', status='$status' $photo_sql WHERE id=$id";
    if (mysqli_query($conn, $sql)) {
        $_SESSION['success'] = "Student updated successfully!";
        header("Location: index.php");
        exit();
    } else {
        $_SESSION['error'] = "Database error: " . mysqli_error($conn);
        header("Location: edit.php?id=$id");
        exit();
    }
}
?>
