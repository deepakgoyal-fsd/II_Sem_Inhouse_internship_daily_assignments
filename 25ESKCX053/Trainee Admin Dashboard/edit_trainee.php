<?php 
include 'header.php'; 

$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM trainees WHERE id=$id");
$trainee = mysqli_fetch_assoc($result);

if (isset($_POST['update_trainee'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $trainer_id = $_POST['trainer_id'];
    $course_id = $_POST['course_id'];
    
    $sql = "UPDATE trainees SET name='$name', email='$email', trainer_id='$trainer_id', course_id='$course_id' WHERE id=$id";
    mysqli_query($conn, $sql);
    echo "<script>window.location.href='index.php';</script>"; 
}

$trainers_list = mysqli_query($conn, "SELECT id, name FROM trainers");
$courses_list = mysqli_query($conn, "SELECT id, course_name FROM courses");
?>

<div class="card shadow-sm w-50 mx-auto mt-4">
    <div class="card-header bg-primary text-white fw-bold">Edit Trainee</div>
    <div class="card-body">
        <form method="POST">
            <div class="mb-3">
                <label>Name</label>
                <input type="text" name="name" class="form-control" value="<?php echo $trainee['name']; ?>" required>
            </div>
            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" value="<?php echo $trainee['email']; ?>" required>
            </div>
            <div class="mb-3">
                <label>Trainer</label>
                <select name="trainer_id" class="form-select" required>
                    <?php while($t = mysqli_fetch_assoc($trainers_list)): ?>
                        <option value="<?php echo $t['id']; ?>" <?php if($trainee['trainer_id'] == $t['id']) echo 'selected'; ?>><?php echo $t['name']; ?></option>
                    <?php endwhile; ?>
                </select>
            </div>
            <div class="mb-3">
                <label>Course</label>
                <select name="course_id" class="form-select" required>
                    <?php while($c = mysqli_fetch_assoc($courses_list)): ?>
                        <option value="<?php echo $c['id']; ?>" <?php if($trainee['course_id'] == $c['id']) echo 'selected'; ?>><?php echo $c['course_name']; ?></option>
                    <?php endwhile; ?>
                </select>
            </div>
            <button type="submit" name="update_trainee" class="btn btn-success w-100">Update</button>
            <a href="index.php" class="btn btn-secondary w-100 mt-2">Cancel</a>
        </form>
    </div>
</div>

<?php include 'footer.php'; ?>