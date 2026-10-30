<?php 
// Brings in nav, sidebar, and DB connection
include 'header.php'; 

// Handle adding a trainer
if (isset($_POST['add_trainer'])) {
    $name = $_POST['name'];
    $expertise = $_POST['expertise'];
    $qualification = $_POST['qualification'];
    $phone = $_POST['phone'];
    
    $sql = "INSERT INTO trainers (name, expertise, qualification, phone) VALUES ('$name', '$expertise', '$qualification', '$phone')";
    mysqli_query($conn, $sql);
}

// Handle deleting a trainer
if (isset($_GET['delete_id'])) {
    $id = $_GET['delete_id'];
    mysqli_query($conn, "DELETE FROM trainers WHERE id=$id");
    echo "<script>window.location.href='trainers.php';</script>";
    exit;
}

$trainers = mysqli_query($conn, "SELECT * FROM trainers");
?>

<h2 class="mb-4">Trainer Management</h2>

<div class="card shadow-sm mb-4">
    <div class="card-header bg-white fw-bold">Add New Trainer</div>
    <div class="card-body">
        <form method="POST" action="" class="row g-3">
            <div class="col-md-3">
                <input type="text" name="name" class="form-control" placeholder="Trainer Name" required>
            </div>
            <div class="col-md-3">
                <input type="text" name="expertise" class="form-control" placeholder="Expertise" required>
            </div>
            <div class="col-md-3">
                <input type="text" name="qualification" class="form-control" placeholder="Qualification (e.g. MCA)" required>
            </div>
            <div class="col-md-2">
                <input type="text" name="phone" class="form-control" placeholder="Phone" required>
            </div>
            <div class="col-md-1">
                <button type="submit" name="add_trainer" class="btn btn-success w-100">+</button>
            </div>
        </form>
    </div>
</div>

<div class="card shadow-sm">
    <div class="card-body">
        <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>ID</th><th>Name</th><th>Expertise</th><th>Qualification</th><th>Phone</th><th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = mysqli_fetch_assoc($trainers)): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['expertise']; ?></td>
                    <td><?php echo $row['qualification']; ?></td>
                    <td><?php echo $row['phone']; ?></td>
                    <td>
                        <a href="edit_trainer.php?id=<?php echo $row['id']; ?>" class="btn btn-primary btn-sm me-1">Edit</a>
                        <a href="trainers.php?delete_id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Delete this trainer?');">Delete</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>

<?php 
// Closes the page and adds the footer
include 'footer.php'; 
?>