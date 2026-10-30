<?php 
include 'header.php'; 

$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM trainers WHERE id=$id");
$trainer = mysqli_fetch_assoc($result);

if (isset($_POST['update_trainer'])) {
    $name = $_POST['name'];
    $expertise = $_POST['expertise'];
    $qualification = $_POST['qualification'];
    $phone = $_POST['phone'];
    
    $sql = "UPDATE trainers SET name='$name', expertise='$expertise', qualification='$qualification', phone='$phone' WHERE id=$id";
    mysqli_query($conn, $sql);
    echo "<script>window.location.href='trainers.php';</script>"; 
}
?>

<div class="card shadow-sm w-50 mx-auto mt-4">
    <div class="card-header bg-primary text-white fw-bold">Edit Trainer</div>
    <div class="card-body">
        <form method="POST">
            <div class="mb-3">
                <label>Name</label>
                <input type="text" name="name" class="form-control" value="<?php echo $trainer['name']; ?>" required>
            </div>
            <div class="mb-3">
                <label>Expertise</label>
                <input type="text" name="expertise" class="form-control" value="<?php echo $trainer['expertise']; ?>" required>
            </div>
            <div class="mb-3">
                <label>Qualification</label>
                <input type="text" name="qualification" class="form-control" value="<?php echo $trainer['qualification']; ?>" required>
            </div>
            <div class="mb-3">
                <label>Phone</label>
                <input type="text" name="phone" class="form-control" value="<?php echo $trainer['phone']; ?>" required>
            </div>
            <button type="submit" name="update_trainer" class="btn btn-success w-100">Update</button>
            <a href="trainers.php" class="btn btn-secondary w-100 mt-2">Cancel</a>
        </form>
    </div>
</div>

<?php include 'footer.php'; ?>