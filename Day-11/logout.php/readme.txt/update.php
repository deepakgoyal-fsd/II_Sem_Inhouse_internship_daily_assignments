<?php
session_start();
include ("header.php");
include ("db_connect.php");

if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}

$current_email = $_SESSION['email'];
$updateMessage = "";
$messageClass = "";

$fetchQuery = "SELECT * FROM users WHERE email = '$current_email'";
$result = mysqli_query($conn, $fetchQuery);

if ($result && mysqli_num_rows($result) > 0) {
    $user = mysqli_fetch_assoc($result);
    $name = $user['name'];
    $email = $user['email'];
} else {
    $name = "";
    $email = "";
    $updateMessage = "Error: Could not retrieve your profile data.";
    $messageClass = "alert-danger";
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $newName = mysqli_real_escape_string($conn, $_POST['name']);
    $newEmail = mysqli_real_escape_string($conn, $_POST['email']);
    

    $updateQuery = "UPDATE users SET name='$newName', email='$newEmail' WHERE email='$current_email'";
    
    if (mysqli_query($conn, $updateQuery)) {
        $updateMessage = "Profile updated successfully!";
        $messageClass = "alert-success";
        
        
        $_SESSION['email'] = $newEmail; 
        

        $current_email = $newEmail;
        $name = $newName;
        $email = $newEmail;
    } else {
        $updateMessage = "Update failed: " . mysqli_error($conn);
        $messageClass = "alert-danger";
    }
}
?>

<div class="container mt-5" style="max-width:400px;">
    <form action="" method="post">
        <h3 class="mb-3">Update Profile</h3>
        
        <?php if(!empty($updateMessage)): ?>
            <div class="alert <?= $messageClass ?> mb-3"><?= $updateMessage ?></div>
        <?php endif; ?>

    
        <input type="text" name="name" class="form-control mb-3" placeholder="Name" value="<?= htmlspecialchars($name) ?>" required>
        
    
        <input type="email" name="email" class="form-control mb-3" placeholder="Email" value="<?= htmlspecialchars($email) ?>" required>

    
        <button type="submit" class="btn btn-primary w-100">Update Details</button>
    </form>
</div>

<?php 
include ("footer.php"); 
?>