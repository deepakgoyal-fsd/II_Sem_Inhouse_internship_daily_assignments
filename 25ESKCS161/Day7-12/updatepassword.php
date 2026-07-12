
<?php
session_start();
include("dashboardheader.php");
include("dashboardverticalcontent.php");
include("db_connect.php");


$msg = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $oldpassword = mysqli_real_escape_string($conn, $_POST["oldpassword"]);
    $newpassword = mysqli_real_escape_string($conn, $_POST["newpassword"]);
    $confirmpassword = mysqli_real_escape_string($conn, $_POST["confirmpassword"]);


    if ($oldpassword == "" || $newpassword == "" || $confirmpassword == "") {
 
        $msg = "All fields are required."; 

    } elseif ($newpassword != $confirmpassword) {
 
        $msg = "New Password and Confirm Password do not match.";

    } else {

        $selectQuery = "SELECT * FROM user WHERE id=" . _SESSION['user_id'];
        $result = mysqli_query($conn, $selectQuery);
        $user = mysqli_fetch_assoc($result);

        if ($user) {
        //echo  "UPDATE user SET password='$newpassword' where id=". $_SESSION['user_id'];  
            $updateQuery = "UPDATE user SET password='$newpassword' where id=". $_SESSION['user_id'];   
  
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
include("dashboardfooter.php");
include("footer.php");
?>