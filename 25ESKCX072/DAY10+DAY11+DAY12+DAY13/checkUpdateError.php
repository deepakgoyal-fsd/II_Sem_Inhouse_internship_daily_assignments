<?php
       

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $newPassword = isset($_POST["newPassword"]) ? mysqli_real_escape_string($conn, $_POST["newPassword"]) : "";
    $confirmPassword = isset($_POST["confirmPassword"]) ? mysqli_real_escape_string($conn, $_POST["confirmPassword"]) : "";
    $oldPassword = isset($_POST["oldPassword"]) ? mysqli_real_escape_string($conn, $_POST["oldPassword"]) : "";

    // 2. Validation: Check for empty fields
    if ($newPassword == "" || $oldPassword == "" || $confirmPassword == "") {
        $error = "All fields are required.";
        echo $error;
    } 
    // 3. Validation: Check if new passwords match
    elseif ($newPassword != $confirmPassword) {
        $error = "Password does not match.";
        echo $error;
    } 
    // 4. Process the update if validations pass
    else {
        // Ensure user is actually logged in
        if (isset($_SESSION['user_id'])) {
            $user_id = $_SESSION['user_id'];

            // Fetch the user's existing data to verify the old password
            $selectQuery = "SELECT * FROM user WHERE id = '$user_id'";
            $result = mysqli_query($conn, $selectQuery);
            $user = mysqli_fetch_assoc($result);

            if ($user && $user['password'] == $oldPassword) {
                // Old password is correct -> Proceed to UPDATE the password
                $updateQuery = "UPDATE user SET password = '$newPassword' WHERE id = '$user_id'";
                $updateResult = mysqli_query($conn, $updateQuery);

                if ($updateResult) {
                    echo "Password updated successfully!";
                    // Optional: header("Location: dashboard.php");
                } else {
                    echo "Error updating password: " . mysqli_error($conn);
                }
            } else {
                $error = "Incorrect old password.";
                echo $error;
            }
        } else {
            echo "You must be logged in to update your password.";
        }
    }
}
?>