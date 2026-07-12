<?php
session_start();

include("db_connect.php");

$error = "";

$oldpassword = "";
$newpassword = "";
$confirmpassword = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Get form data
    $oldpassword = mysqli_real_escape_string($conn, $_POST["old_password"]);
    $newpassword = mysqli_real_escape_string($conn, $_POST["new_password"]);
    $confirmpassword = mysqli_real_escape_string($conn, $_POST["confirm_password"]);

    // Check if fields are empty
    if (empty($oldpassword) || empty($newpassword) || empty($confirmpassword)) {

        $error = "All fields are required.";
        echo $error;

    }
    // Check if new password and confirm password match
    elseif ($newpassword != $confirmpassword) {

        echo "Passwords do not match.";

    }
    else {

        // Get current user details
    
        $selectQuery = "SELECT * FROM user WHERE email = '" . $_SESSION['user_email'] . "'";
        $result = mysqli_query($conn, $selectQuery);

        if ($result && mysqli_num_rows($result) > 0) {

            $user = mysqli_fetch_assoc($result);

            // Verify old password
            if ($user["password"] == $oldpassword) {

                // Update password
                $updateQuery = "UPDATE user 
                                SET password = '$newpassword' 
                                WHERE email = '" . $_SESSION['user_email'] . "'";

                if (mysqli_query($conn, $updateQuery)) {

                    echo "Password changed successfully.";

                    header("Location: dashboardday11.php");
                    exit();

                } else {

                    echo "Error updating password.";
                    echo mysqli_error($conn);

                }

            } else {

                echo "Old password is incorrect.";

            }

        } else {

            echo "User not found.";

        }
    }
}
?>
