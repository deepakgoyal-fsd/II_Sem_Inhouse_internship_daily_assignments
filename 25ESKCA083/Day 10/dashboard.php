<?php
session_start();

if (!isset($_SESSION['user_name'])){
    header("Location: login.php");
    exit();
}
include("headerfordash.php");
?>

<div class="container mt-5">
    <div class="alert alert-success">
        <h4>Welcome, <?php echo htmlspecialchars($_SESSION['user_name']); ?>!</h4>
    </div>
    
    <a href="updatepassword.php" class="btn btn-secondary">Update Password</a>
</div>

<?php
include("footer.php");
?>