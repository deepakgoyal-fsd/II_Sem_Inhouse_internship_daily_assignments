<?php
include("db_connect.php");
include("dashhead.php");
include("dashboardvertContent.php");
include("upload.php");

$success_msg = "";
$error_msg = "";
$user_skills = [];

// Fetch existing skills for the logged-in user
if (isset($_SESSION['user_id'])) {
    $selectQuery = "SELECT skill FROM `user` WHERE id = " . (int)$_SESSION['user_id'];
    $result = mysqli_query($conn, $selectQuery);
    $user = mysqli_fetch_assoc($result);
    
    if ($user && !empty($user['skill'])) {
        $user_skills = explode(", ", $user['skill']);
    }
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($conn, $_POST['name'] ?? "");
    $skill = isset($_POST['skill']) ? $_POST['skill'] : [];
    $skills_string = implode(", ", $skill);
    
    if (!empty($name) && isset($_SESSION['user_id'])) {
        $updateQuery = "UPDATE `user` SET name = '$name', skill = '$skills_string' WHERE id = " . (int)$_SESSION['user_id'];
        $result = mysqli_query($conn, $updateQuery);
        
        if ($result) {
            $success_msg = "Profile updated successfully!";
            $_SESSION['user_name'] = $name;
            $user_skills = $skill; // Update the skills array to reflect the changes
        } else {
            $error_msg = "Error updating profile: " . mysqli_error($conn);
        }
    } else {
        $error_msg = "Name is required.";
    }
}

?>
<div class="container mt-5" style="max-width:400px;">
	<?php if (!empty($success_msg)): ?>
		<div class="alert alert-success"><?php echo $success_msg; ?></div>
	<?php endif; ?>
	<?php if (!empty($error_msg)): ?>
		<div class="alert alert-danger"><?php echo $error_msg; ?></div>
	<?php endif; ?>
	
	<form action="" method="post">
		<h3 class="mb-3">Update Profile</h3>

		<input type="text" class="form-control mb-3" placeholder="Name" name="name" value="<?php echo htmlspecialchars($_SESSION["user_name"] ?? ''); ?>" required>
        <input type="file" class="form-control mb-3" placeholder="Profile Picture" name="profile_picture">
		<label><strong>Select Skills:</strong></label><br>
        <input type="checkbox" name="skill[]" value="HTML" <?php echo in_array('HTML', $user_skills) ? 'checked' : ''; ?>> HTML<br>
        <input type="checkbox" name="skill[]" value="CSS" <?php echo in_array('CSS', $user_skills) ? 'checked' : ''; ?>> CSS<br>
        <input type="checkbox" name="skill[]" value="JavaScript" <?php echo in_array('JavaScript', $user_skills) ? 'checked' : ''; ?>> JavaScript<br>
        <input type="checkbox" name="skill[]" value="PHP" <?php echo in_array('PHP', $user_skills) ? 'checked' : ''; ?>> PHP<br>
        <input type="checkbox" name="skill[]" value="Python" <?php echo in_array('Python', $user_skills) ? 'checked' : ''; ?>> Python<br>
        <input type="checkbox" name="skill[]" value="Java" <?php echo in_array('Java', $user_skills) ? 'checked' : ''; ?>> Java<br>
        <input type="checkbox" name="skill[]" value="C++" <?php echo in_array('C++', $user_skills) ? 'checked' : ''; ?>> C++<br>
        <input type="checkbox" name="skill[]" value="C#" <?php echo in_array('C#', $user_skills) ? 'checked' : ''; ?>> C#<br>
        <input type="checkbox" name="skill[]" value="Ruby" <?php echo in_array('Ruby', $user_skills) ? 'checked' : ''; ?>> Ruby<br>
        <input type="checkbox" name="skill[]" value="Bootstrap" <?php echo in_array('Bootstrap', $user_skills) ? 'checked' : ''; ?>> Bootstrap<br><br>
		<button type="submit" class="btn btn-primary w-100">Update</button>
	</form>
</div>
<?php
include("dashboardfooter.php");
include("footer.php");
?>