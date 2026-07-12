<?php
session_start();
include("header.php");

if (!isset($_SESSION['user_name'])) {
        header("location: login.php");
        exit();
    }

?>

<div class="contianer-fluid">
    <div class="row">
        <div class="col-mid">
            <a href="updatePassword.php">Upadate Password</a><br>
            <a href="updateProfile.php">Upadate Profile</a>
        </div>
        <div class="col-md-9">
            <h2><?php
                echo "Welcome, " . $_SESSION["user_name"] . "]";
                ?>
            </h2>
        </div>
    </div>
</div>


<?php
    include("footer.php");
?>