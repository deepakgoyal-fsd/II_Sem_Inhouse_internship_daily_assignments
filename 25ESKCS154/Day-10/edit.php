<?php include 'db.php';
$id=(int)$_GET['id'];
$row=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM students WHERE id=$id"));
?>
<!DOCTYPE html><html><head><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"></head><body>
<div class="container py-4"><h2>Edit Student</h2>
<form action="update.php" method="POST">
<input type="hidden" name="id" value="<?=$row['id']?>">
<input class="form-control mb-2" name="name" value="<?=$row['name']?>">
<input class="form-control mb-2" name="email" value="<?=$row['email']?>">
<input class="form-control mb-2" name="branch" value="<?=$row['branch']?>">
<input class="form-control mb-2" name="cgpa" value="<?=$row['cgpa']?>">
<button class="btn btn-success">Update</button>
</form></div></body></html>