<?php
session_start();
include("dashboardHeader.php");
include("dashboardVerticalContent.php");
include("db_connect1.php");

$msg = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $oldpassword = mysqli_real_escape_string($conn, $_POST["oldpassword"]);
    $newpassword = mysqli_real_escape_string($conn, $_POST["newpassword"]);
    $confirmpassword = mysqli_real_escape_string($conn, $_POST["confirmpassword"]);

    $email = $_SESSION['user_email'];

    if ($oldpassword == "" || $newpassword == "" || $confirmpassword == "") {

        $msg = "All fields are required.";

    } elseif ($newpassword != $confirmpassword) {

        $msg = "New Password and Confirm Password do not match.";

    } else {

        $selectQuery = "SELECT * FROM user WHERE email='$email' AND password='$oldpassword'";
        $result = mysqli_query($conn, $selectQuery);
        $user = mysqli_fetch_assoc($result);

        if ($user) {

            $updateQuery = "UPDATE user SET password='$newpassword' WHERE email='$email'";

            if (mysqli_query($conn, $updateQuery)) {
                $msg = "Password updated successfully.";
            } else {
                $msg = "Password could not be updated.";
            }

        } else {
            $msg = "Old Password is incorrect.";
        }
    }
}
?>

<div class="container mt-5" style="max-width:400px;">
    <form action="" method="post">
        <h3 class="mb-3">Update Password</h3>

        <input type="password" class="form-control mb-3"
        name="oldpassword" placeholder="Old Password">

        <input type="password" class="form-control mb-3"
        name="newpassword" placeholder="New Password">

        <input type="password" class="form-control mb-3"
        name="confirmpassword" placeholder="Confirm Password">

        <button class="btn btn-primary w-100" name="update">
            Update Password
        </button>

        <p class="mt-3 text-danger"><?php echo $msg; ?></p>

    </form>
</div>

<?php
include("dashboardFooter.php");
include("footer.php");
?>