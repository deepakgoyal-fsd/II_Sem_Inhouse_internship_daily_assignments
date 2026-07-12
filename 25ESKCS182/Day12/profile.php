<?php
session_start();
include('db_connect.php');

$error = "";
$success = "";
$displayImage = 'profile.jpg';

if (isset($_SESSION['user_id'])) {
    $user_id = intval($_SESSION['user_id']);
    $result = mysqli_query($conn, "SELECT myFile FROM user WHERE id = $user_id");
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        if (!empty($row['myFile'])) {
            $displayImage = $row['myFile'];
        }
    }
}

if (!isset($_SESSION['user_id'])) {
    $error = "Please log in first to upload a profile picture.";
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['profile_image']) && $_FILES['profile_image']['error'] === UPLOAD_ERR_OK) {
        $allowed_types = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
        $finfo = new finfo(FILEINFO_MIME_TYPE);
        $mime_type = $finfo->file($_FILES['profile_image']['tmp_name']);

        if (!in_array($mime_type, $allowed_types, true)) {
            $error = "Only JPG, PNG, GIF, and WEBP images are allowed.";
        } elseif ($_FILES['profile_image']['size'] > 2 * 1024 * 1024) {
            $error = "File size must be 2MB or less.";
        } else {
            $checkColumn = mysqli_query($conn, "SHOW COLUMNS FROM user LIKE 'profile_image'");
            if (mysqli_num_rows($checkColumn) === 0) {
                mysqli_query($conn, "ALTER TABLE user ADD COLUMN profile_image LONGBLOB NULL");
            }

            $image_data = file_get_contents($_FILES['profile_image']['tmp_name']);
            $user_id = intval($_SESSION['user_id']);

            $stmt = mysqli_prepare($conn, "UPDATE user SET profile_image = ? WHERE id = ?");
            if ($stmt) {
                mysqli_stmt_bind_param($stmt, 'bi', $image_data, $user_id);
                if (mysqli_stmt_execute($stmt)) {
                    $success = "Profile picture uploaded successfully.";
                } else {
                    $error = "Failed to save the image. Please try again.";
                }
                mysqli_stmt_close($stmt);
            } else {
                $error = "Database update failed.";
            }
        }
    } else {
        $error = "Please select an image file to upload.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Website</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <header class="bg-border-bottom">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center py-3">
                <img src="https://www.vhv.rs/dpng/d/549-5499076_hd-logo-design-transparent-background-hd-png-download.png" alt="Logo" class="logo-img" style="width: 80px; height: 50px;">
                <div class="logo">
                    <h1 class="m-0">My Website</h1>
                </div>
                <nav>
                    <ul class="nav">
                        <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
                        <li class="nav-item"><a href="about.php" class="nav-link">About</a></li>
                        <li class="nav-item"><a href="services.php" class="nav-link">Services</a></li>
                        <li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f4f4f4;
        }

        .profile-header {
            text-align: center;
        }

        .profile-header h1 {
            color: #333;
            margin: 10px 0;
        }

        .profile-header img {
            border-radius: 50%;
            width: 250px;
            height: 250px;
            object-fit: cover;
            border: 3px solid #ddd;
        }

        hr {
            margin: 20px 0;
            border: none;
            border-top: 1px solid #ddd;
        }

        a {
            color: #007bff;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        ul, ol {
            margin-left: 20px;
        }

        li {
            margin: 8px 0;
        }
    </style>

    <div class="container mt-5" style="max-width: 700px;">
        <div class="card shadow-sm p-4">
            <div class="profile-header">
                <img src="<?php echo htmlspecialchars($displayImage); ?>" alt="Profile" class="img-fluid mb-3" style="max-width: 220px;">
                <h3 class="mb-3">Upload Profile Picture</h3>
            </div>

            <form method="post" enctype="multipart/form-data">
                <input type="file" id="Myfile" name="profile_image" accept="image/*" required>
                <button type="submit" class="btn btn-primary mt-3">Upload</button>
            </form>

            <?php if (!empty($error)) { echo '<div class="alert alert-danger mt-3">' . htmlspecialchars($error) . '</div>'; } ?>
            <?php if (!empty($success)) { echo '<div class="alert alert-success mt-3">' . htmlspecialchars($success) . '</div>'; } ?>
        </div>
    </div>

    <?php include('footer.php'); ?>
</body>
</html>
