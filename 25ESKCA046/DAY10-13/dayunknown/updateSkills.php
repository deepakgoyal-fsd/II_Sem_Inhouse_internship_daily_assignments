<?php
session_start();
include("dashboardHeader.php");
include("dashboardOptions.php");
include("db_connect.php");
$message = "";

$email = $_SESSION['user_email'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // 1. Grab the checked boxes and join them with a SPACE instead of a comma
    if (isset($_POST['skills'])) {
        $skillsString = mysqli_real_escape_string($conn, implode(" ", $_POST['skills'])); 
    } else {
        $skillsString = ""; // If nothing is checked
    }
    
    // 2. Update the database
    $sql = "UPDATE user SET skills = '$skillsString' WHERE email = '$email'";
    
    if (mysqli_query($conn, $sql)) {
        $message = "<div class='alert alert-success text-center'>Skills updated: $skillsString</div>";
    } else {
        $message = "<div class='alert alert-danger'>Error: " . mysqli_error($conn) . "</div>";
    }
}
?>

<div class="container mt-4" style="max-width:500px;">
    <?php echo $message; ?>
    
    <div class="card shadow-sm border-0">
        <div class="card-body p-4">
            <h4 class="mb-4 text-center">Select Your Skills</h4>
            
            <form action="updateSkills.php" method="POST">
                <div class="bg-light p-3 rounded mb-3">

                    <div class="form-check mb-2">
                        <input class="form-check-input" type="checkbox" name="skills[]" value="C">
                        <label class="form-check-label">C</label>
                    </div>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="checkbox" name="skills[]" value="C++">
                        <label class="form-check-label">C++</label>
                    </div>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="checkbox" name="skills[]" value="HTML">
                        <label class="form-check-label">HTML</label>
                    </div>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="checkbox" name="skills[]" value="CSS">
                        <label class="form-check-label">CSS</label>
                    </div>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="checkbox" name="skills[]" value="Java">
                        <label class="form-check-label">Java</label>
                    </div>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="checkbox" name="skills[]" value="Bootstrap">
                        <label class="form-check-label">Bootstrap</label>
                    </div>
                </div>
                
                <button type="submit" class="btn btn-primary w-100">Save Skills</button>
            </form>
        </div>
    </div>
</div>

<?php
include("dashboardfooter.php");
include("footer.php");
?>