<?php
session_start();
include("db_connect1.php");

if (!isset($_SESSION['user_email'])) {
    header("Location: login.php");
    exit();
}

$email = $_SESSION['user_email'];

if (isset($_POST['update'])) {

    $oldPassword = mysqli_real_escape_string($conn, $_POST['old_password']);
    $newPassword = mysqli_real_escape_string($conn, $_POST['new_password']);
    $confirmPassword = mysqli_real_escape_string($conn, $_POST['confirm_password']);

    // Check old password
    $query = "SELECT * FROM user WHERE email='$email' AND password='$oldPassword'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {

        if ($newPassword == $confirmPassword) {

            $updateQuery = "UPDATE user SET password='$newPassword' WHERE email='$email'";

            if (mysqli_query($conn, $updateQuery)) {

                echo "<script>
                        alert('Password Updated Successfully');
                        window.location='dashboard.php';
                      </script>";
            } else {
                echo "<script>alert('Password Not Updated');</script>";
            }

        } else {
            echo "<script>alert('New Password and Confirm Password do not match');</script>";
        }

    } else {
        echo "<script>alert('Old Password is Incorrect');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Password</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<div class="container mt-5">

    <div class="card shadow">

        <div class="card-header bg-primary text-white">
            <h2>Update Password</h2>
        </div>

        <div class="card-body">

            <form method="POST">

                <div class="mb-3">
                    <label class="form-label">Old Password</label>
                    <input type="password"
                           name="old_password"
                           class="form-control"
                           required>
                </div>

                <div class="mb-3">
                    <label class="form-label">New Password</label>
                    <input type="password"
                           name="new_password"
                           class="form-control"
                           required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Confirm Password</label>
                    <input type="password"
                           name="confirm_password"
                           class="form-control"
                           required>
                </div>

                <button type="submit"
                        name="update"
                        class="btn btn-success">
                    Update Password
                </button>

                <a href="dashboard.php"
                   class="btn btn-secondary">
                    Back
                </a>

            </form>

        </div>

    </div>

</div>

</body>
</html>