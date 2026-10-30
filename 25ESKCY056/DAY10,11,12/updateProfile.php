<?php
include("db_connect.php");
/** @var mysqli $conn */ 

session_start();
include("db_connect.php");
include("header.php");

// Protect the page: Redirect to login if user is not logged in
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}

$email = $_SESSION['email'];
$error = "";
$success = "";

// Fetch current user details to populate the form fields
$fetchQuery = "SELECT * FROM intern_yash WHERE email = '$email'";
$result = mysqli_query($conn, $fetchQuery);
$user = mysqli_fetch_assoc($result);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    
    if (empty($name)) {
        $error = "Name field cannot be empty.";
    } else {
        // Update query
        $updateQuery = "UPDATE intern_yash SET name = '$name' WHERE email = '$email'";
        if (mysqli_query($conn, $updateQuery)) {
            $success = "Profile updated successfully!";
            // Refresh data
            $user['name'] = $name;
        } else {
            $error = "Error updating profile: " . mysqli_error($conn);
        }
    }
}
?>

<div class="container mt-5" style="max-width: 400px;">
    <h3>Update Profile</h3>
    
    <?php if(!empty($error)): ?>
        <div class="alert alert-danger"><?php echo $error; ?></div>
    <?php endif; ?>
    
    <?php if(!empty($success)): ?>
        <div class="alert alert-success"><?php echo $success; ?></div>
    <?php endif; ?>

    <form action="" method="POST">
        <div class="mb-3">
            <label class="form-label">Email (Cannot be changed)</label>
            <input type="email" class="form-control" value="<?php echo $user['email']; ?>" disabled>
        </div>
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" name="name" class="form-control" value="<?php echo $user['name']; ?>">
        </div>
        <button type="submit" class="btn btn-primary w-100">Save Changes</button>
    </form>
</div>

<?php 
include("footer.php"); 
?>