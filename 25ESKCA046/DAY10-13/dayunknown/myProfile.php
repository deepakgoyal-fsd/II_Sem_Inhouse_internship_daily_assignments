<?php
session_start();

include("dashboardHeader.php");
include("dashboardOptions.php");
include('db_connect.php');

$userId = $_SESSION['user_id'];
$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["profileImage"])) {
    
    $targetDir = "uploads/";
    $fileName = time() . "_" . basename($_FILES["profileImage"]["name"]);
    $targetFilePath = $targetDir . $fileName;

    if (move_uploaded_file($_FILES["profileImage"]["tmp_name"], $targetFilePath)) {
        
        $updateSql = "UPDATE user SET profile_pic = ? WHERE id = ?";
        $stmt = mysqli_prepare($conn, $updateSql);
        
        mysqli_stmt_bind_param($stmt, "si", $targetFilePath, $userId);
        mysqli_stmt_execute($stmt);
        
        $message = "<div class='alert alert-success text-center'>Profile picture updated!</div>";
    } else {
        $message = "<div class='alert alert-danger text-center'>Error uploading image. Make sure the 'uploads' folder exists!</div>";
    }
}

$sql = "SELECT * FROM user WHERE id = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "i", $userId);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

$user = mysqli_fetch_assoc($result);

$skillsArray = [];
if (!empty($user['skills'])) {
    $skillsArray = explode(" ", $user['skills']); 
}

$profilePic = !empty($user['profile_pic']) ? $user['profile_pic'] : "https://via.placeholder.com/150";
?>

<div class="container mt-4" style="max-width: 500px;">
    
    <?php echo $message; ?>

    <div class="card shadow rounded-3 border-0">
        <div class="card-body text-center p-4">

            <img src="<?php echo htmlspecialchars($profilePic); ?>" alt="Profile Picture" class="rounded-circle mb-3" style="width: 150px; height: 150px; object-fit: cover; border: 3px solid #0d6efd;">
            
            <h3 class="mb-1"><?php echo htmlspecialchars($user['name']); ?></h3>
            <p class="text-muted mb-2"><?php echo htmlspecialchars($user['email']); ?></p>
            <p class="badge bg-secondary mb-3"><?php echo htmlspecialchars($user['role']); ?></p>

            <hr>

            <h5 class="mt-3 mb-3">My Skills</h5>
            <div>
                <?php 
                if (count($skillsArray) > 0) {
                    foreach($skillsArray as $skill) {
                        $skill = trim($skill);
                        
                        if (!empty($skill)) {
                            echo "<span class='badge bg-primary me-1 mb-2 fs-6'>" . htmlspecialchars($skill) . "</span>";
                        }
                    }
                } else {
                    echo "<p class='text-muted'>No skills added yet.</p>";
                }
                ?>
            </div>

            <hr class="mt-4">
            
            <form action="myProfile.php" method="POST" enctype="multipart/form-data" class="mt-3">
                <label class="form-label fw-bold">Update Profile Picture</label>
                <div class="input-group">
                    <input type="file" name="profileImage" class="form-control" required accept="image/*">
                    <button type="submit" class="btn btn-outline-primary">Upload</button>
                </div>
            </form>

        </div>
    </div>
</div>

<?php
include("dashboardfooter.php");
include("footer.php");
?>