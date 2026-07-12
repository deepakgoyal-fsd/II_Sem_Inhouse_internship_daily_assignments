<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

include("db-connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $oldPassword = $_POST['oldpassword'];
    $newPassword = $_POST['newpassword'];
    $confirmPassword = $_POST['confirmpassword'];

    // Check new password confirmation
    if ($newPassword !== $confirmPassword) {
        echo "<script>
                alert('New Password and Confirm Password do not match.');
                window.location='updatePassword.php';
              </script>";
        exit();
    }

    // Get current user's password
    $stmt = mysqli_prepare($conn, "SELECT password FROM user WHERE id = ?");
    mysqli_stmt_bind_param($stmt, "i", $_SESSION['user_id']);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    if ($user = mysqli_fetch_assoc($result)) {

        // Verify old password
        if (!password_verify($oldPassword, $user['password'])) {

            echo "<script>
                    alert('Current Password is incorrect.');
                    window.location='updatePassword.php';
                  </script>";
            exit();
        }

        // Hash new password
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

        $update = mysqli_prepare($conn, "UPDATE user SET password = ? WHERE id = ?");
        mysqli_stmt_bind_param($update, "si", $hashedPassword, $_SESSION['user_id']);

        if (mysqli_stmt_execute($update)) {

            echo "<script>
                    alert('Password updated successfully.');
                    window.location='dashboard.php';
                  </script>";

        } else {

            echo "<script>
                    alert('Failed to update password.');
                    window.location='updatePassword.php';
                  </script>";
        }

        mysqli_stmt_close($update);

    } else {

        echo "<script>
                alert('User not found.');
                window.location='login.php';
              </script>";
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
?>