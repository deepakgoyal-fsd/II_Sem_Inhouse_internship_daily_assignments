<?php
$error = "";
$success = "";


$newPassword = "";
$confirmNewPassword= "";
$oldPassword = "";



if ($_SERVER["REQUEST_METHOD"] == "POST") {

    
    $newPassword = mysqli_real_escape_string($conn, $_POST["newPassword"] ?? "");
    $confirmNewPassword = mysqli_real_escape_string($conn, $_POST["confirmNewPassword"] ?? "");
    $oldPassword = mysqli_real_escape_string($conn, $_POST["oldPassword"] ?? "");

    if ( $newPassword == "" || $confirmNewPassword == "" || $oldPassword == "") {
        $error = "All fields are required";

    } elseif ($newPassword != $confirmNewPassword) {
        $error = "Password Does not match";

    } else {
        $userId = $_SESSION['user_id'];
        $selectQuery = "SELECT * FROM user WHERE id = $userId";
        $result = mysqli_query($conn, $selectQuery);
        
        $user = mysqli_fetch_assoc($result);

        if ($user && $user["password"] == $oldPassword) {

            $updateQuery = "UPDATE user SET password = '$newPassword' WHERE id = $userId";
            mysqli_query($conn, $updateQuery);
            $success = "Password updated successfully";
           
        }elseif($user){
            $error = "Old Password doest not match";
        }
    }
}
?>
