<?php 
include 'header.php'; 

// Handle adding a trainee
if (isset($_POST['add_trainee'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $trainer_id = $_POST['trainer_id'];
    $course_id = $_POST['course_id'];
    $date = $_POST['join_date'];
    
    $sql = "INSERT INTO trainees (name, email, trainer_id, course_id, join_date) 
            VALUES ('$name', '$email', '$trainer_id', '$course_id', '$date')";
    mysqli_query($conn, $sql);
}

// Handle deleting a trainee
if (isset($_GET['delete_id'])) {
    $id = $_GET['delete_id'];
    mysqli_query($conn, "DELETE FROM trainees WHERE id=$id");
    echo "<script>window.location.href='index.php';</script>"; 
    exit;
}

// Fetch trainees, trainers, and courses
$query = "SELECT trainees.*, trainers.name AS trainer_name, courses.course_name 
          FROM trainees 
          LEFT JOIN trainers ON trainees.trainer_id = trainers.id
          LEFT JOIN courses ON trainees.course_id = courses.id";
$trainees = mysqli_query($conn, $query);

$trainers_list = mysqli_query($conn, "SELECT id, name FROM trainers");
$courses_list = mysqli_query($conn, "SELECT id, course_name FROM courses");
?>

<h2 class="mb-4">Trainee Management</h2>

<div class="card shadow-sm mb-4">
    <div class="card-header bg-white fw-bold">Add New Trainee</div>
    <div class="card-body">
        <form method="POST" action="" class="row g-3">
            <div class="col-md-3">
                <input type="text" name="name" class="form-control" placeholder="Full Name" required>
            </div>
            <div class="col-md-2">
                <input type="email" name="email" class="form-control" placeholder="Email Address" required>
            </div>
            <div class="col-md-2">
                <select name="trainer_id" class="form-select" required>
                    <option value="">Assign Trainer...</option>
                    <?php while($t = mysqli_fetch_assoc($trainers_list)): ?>
                        <option value="<?php echo $t['id']; ?>"><?php echo $t['name']; ?></option>
                    <?php endwhile; ?>
                </select>
            </div>
            <div class="col-md-2">
                <select name="course_id" class="form-select" required>
                    <option value="">Assign Course...</option>
                    <?php while($c = mysqli_fetch_assoc($courses_list)): ?>
                        <option value="<?php echo $c['id']; ?>"><?php echo $c['course_name']; ?></option>
                    <?php endwhile; ?>
                </select>
            </div>
            <div class="col-md-2">
                <input type="date" name="join_date" class="form-control" required>
            </div>
            <div class="col-md-1">
                <button type="submit" name="add_trainee" class="btn btn-success w-100">+</button>
            </div>
        </form>
    </div>
</div>

<div class="card shadow-sm">
    <div class="card-body">
        <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>ID</th><th>Name</th><th>Email</th><th>Trainer</th><th>Course</th><th>Date</th><th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = mysqli_fetch_assoc($trainees)): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['trainer_name'] ? $row['trainer_name'] : '-'; ?></td>
                    <td><?php echo $row['course_name'] ? $row['course_name'] : '-'; ?></td>
                    <td><?php echo $row['join_date']; ?></td>
                    <td>
                        <a href="edit_trainee.php?id=<?php echo $row['id']; ?>" class="btn btn-primary btn-sm me-1">Edit</a>
                        <a href="index.php?delete_id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Delete?');">Delete</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include 'footer.php'; ?>