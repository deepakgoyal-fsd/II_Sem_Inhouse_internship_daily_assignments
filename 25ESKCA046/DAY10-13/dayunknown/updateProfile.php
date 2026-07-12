<?php
session_start();
include("dashboardHeader.php");
include("dashboardOptions.php");
include('db_connect.php');

$message = "";
$messageColor = ""; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['newName']) && isset($_SESSION['user_email'])) {
        
        $newName = mysqli_real_escape_string($conn, trim($_POST['newName']));
        $userEmail = $_SESSION['user_email']; 

        if ($newName == "") {
            $message = "All fields are required.";
            $messageColor = "danger"; 
        } else {
            $sql = "UPDATE user SET name = '$newName' WHERE email = '$userEmail'";
            
            if (mysqli_query($conn, $sql)) {
                $_SESSION['user_name'] = $newName; 
                $message = "Name updated successfully!";
                $messageColor = "success"; 
            } else {
                $message = "Error updating name: " . mysqli_error($conn);
                $messageColor = "danger"; 
            }
        }
    }
}
?>

<div class="container mt-5" style="max-width:500px;">
    
    <?php if($message != ""): ?>
        <div class="alert alert-<?php echo $messageColor; ?> text-center alert-dismissible fade show">
            <?php echo $message; ?>
        </div>
    <?php endif; ?>
    <div class="card shadow-sm border-0">
        <div class="card-body p-4">
            <h4 class="card-title mb-4 text-center text-primary">Update Profile Name</h4>
            
            <form action="updateProfile.php" method="POST">
                <div class="mb-4">
                    <label class="form-label text-muted">Full Name</label>
                    <input type="text" name="newName" class="form-control form-control-lg bg-light" placeholder="Enter New Name" required value="<?php echo $_SESSION['user_name']; ?>">
                </div>
                
                <button type="submit" class="btn btn-primary w-100 btn-lg">Save Changes</button>
            </form>
        </div>
    </div>
</div>

<?php
include("dashboardfooter.php");
include("footer.php");
?>