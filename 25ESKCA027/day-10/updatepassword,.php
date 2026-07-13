<?php
include("header.php");
include("db_connect.php");

$error = "";
$success = "";

$email = "";
$currentPassword = "";
$newPassword = "";
$confirmNewPassword = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = mysqli_real_escape_string($conn, $_POST["email"] ?? "");
    $currentPassword = mysqli_real_escape_string($conn, $_POST["currentPassword"] ?? "");
    $newPassword = mysqli_real_escape_string($conn, $_POST["newPassword"] ?? "");
    $confirmNewPassword = mysqli_real_escape_string($conn, $_POST["confirmNewPassword"] ?? "");

    if ($email == "" || $currentPassword == "" || $newPassword == "" || $confirmNewPassword == "") {
        $error = "All fields are required.";
    } elseif ($newPassword != $confirmNewPassword) {
        $error = "New password does not match.";
    } else {
        $checkQuery = "SELECT * FROM user WHERE email='$email' AND password='$currentPassword'";
        $result = mysqli_query($conn, $checkQuery);

        if (mysqli_num_rows($result) > 0) {
            $updateQuery = "UPDATE user SET password='$newPassword' WHERE email='$email' AND password='$currentPassword'";

            if (mysqli_query($conn, $updateQuery)) {
                $success = "Password updated successfully.";
                $email = "";
                $currentPassword = "";
                $newPassword = "";
                $confirmNewPassword = "";
            } else {
                $error = "Failed to update password.";
            }
        } else {
            $error = "Invalid email or current password.";
        }
    }
}
?>
<?php include("footer.php"); ?>
