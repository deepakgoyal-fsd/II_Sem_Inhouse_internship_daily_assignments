<?php 
include 'header.php'; 

// Handle adding a course
if (isset($_POST['add_course'])) {
    $course_name = $_POST['course_name'];
    $duration = $_POST['duration'];
    
    $sql = "INSERT INTO courses (course_name, duration) VALUES ('$course_name', '$duration')";
    mysqli_query($conn, $sql);
}

// Handle deleting a course
if (isset($_GET['delete_id'])) {
    $id = $_GET['delete_id'];
    mysqli_query($conn, "DELETE FROM courses WHERE id=$id");
    echo "<script>window.location.href='courses.php';</script>"; 
    exit;
}

$courses = mysqli_query($conn, "SELECT * FROM courses");
?>

<h2 class="mb-4">Course Management</h2>

<div class="card shadow-sm mb-4">
    <div class="card-header bg-white fw-bold">Add New Course</div>
    <div class="card-body">
        <form method="POST" action="" class="row g-3">
            <div class="col-md-5">
                <input type="text" name="course_name" class="form-control" placeholder="Course Name (e.g., Python Basics)" required>
            </div>
            <div class="col-md-5">
                <input type="text" name="duration" class="form-control" placeholder="Duration (e.g., 4 Weeks)" required>
            </div>
            <div class="col-md-2">
                <button type="submit" name="add_course" class="btn btn-success w-100">Add Course</button>
            </div>
        </form>
    </div>
</div>

<div class="card shadow-sm">
    <div class="card-body">
        <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Course Name</th>
                    <th>Duration</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = mysqli_fetch_assoc($courses)): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['course_name']; ?></td>
                    <td><?php echo $row['duration']; ?></td>
                    <td>
                        <a href="edit_course.php?id=<?php echo $row['id']; ?>" class="btn btn-primary btn-sm me-1">Edit</a>
                        <a href="courses.php?delete_id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Delete this course?');">Delete</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        <?php if(mysqli_num_rows($courses) == 0) echo "<p class='text-center text-muted mt-3'>No courses available.</p>"; ?>
    </div>
</div>

<?php 
include 'footer.php'; 
?>