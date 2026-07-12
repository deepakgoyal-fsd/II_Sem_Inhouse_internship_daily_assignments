<?php
$error = "";

$newpassword = "";
$confirmpassword = "";
$oldpassword = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $newpassword = mysqli_real_escape_string($conn, $_POST["newpassword"]);
    $confirmpassword = mysqli_real_escape_string($conn, $_POST["confirmpassword"]);
    $oldpassword = mysqli_real_escape_string($conn, $_POST["oldpassword"]);

    if ($newpassword == "" || $confirmpassword == "" || $oldpassword == "") {
        $error = "All fields are required.";
        echo $error;

    } elseif ($newpassword != $confirmpassword) {
        echo "New Password and Confirm Password do not match.";

    } else {
        // Get current user
        $selectQuery = "SELECT * FROM user WHERE id = '".$_SESSION['user_id']."'";
        $result = mysqli_query($conn, $selectQuery);
        $user = mysqli_fetch_assoc($result);

        if($user && $user["password"] == $oldpassword){
            $updatequery = "update user set password='$newpassword' where id='{$_SESSION['user_id']}'";
            $result = mysqli_query($conn, $updatequery);

            header("Location: updatesuccess.php");
            exit();
        }
    }
}
?>