<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

include("db-connect.php");
include("header.php");
include("dashboardheader.php");

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $oldpassword = $_POST['oldpassword'];
    $newpassword = $_POST['newpassword'];
    $confirmpassword = $_POST['confirmpassword'];

    if ($newpassword != $confirmpassword) {
        $message = "<div class='alert alert-danger'>New Password and Confirm Password do not match.</div>";
    } else {

        $id = $_SESSION['user_id'];

        $sql = "SELECT password FROM user WHERE id='$id'";
        $result = mysqli_query($conn, $sql);

        if ($row = mysqli_fetch_assoc($result)) {

            if (password_verify($oldpassword, $row['password'])) {

                $hash = password_hash($newpassword, PASSWORD_DEFAULT);

                mysqli_query($conn, "UPDATE user SET password='$hash' WHERE id='$id'");

                $message = "<div class='alert alert-success'>Password updated successfully.</div>";

            } else {
                $message = "<div class='alert alert-danger'>Old password is incorrect.</div>";
            }

        }

    }
}
?>

<div class="container mt-5" style="max-width:400px;">

    <?= $message ?>

    <form action="" method="post">

        <h3 class="mb-3">Update Password</h3>

        <input type="password" class="form-control mb-3" name="oldpassword" placeholder="Old Password" required>

        <input type="password" class="form-control mb-3" name="newpassword" placeholder="New Password" required>

        <input type="password" class="form-control mb-3" name="confirmpassword" placeholder="Confirm Password" required>

        <button type="submit" class="btn btn-primary w-100">
            Update
        </button>

    </form>

</div>

<?php include("footer.php"); ?>