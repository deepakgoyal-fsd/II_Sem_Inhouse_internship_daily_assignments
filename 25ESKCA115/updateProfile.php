<?php
include("dashboard.php");
include("db_connect.php");

?>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
$allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
$file = $_FILES['file'];
// Basic validation
if (!in_array($file['type'], $allowed_types)) {
die("Error: Only JPG, PNG, GIF allowed.");
}
if ($file['size'] > 2 * 1024 * 1024) {
die("Error: File too large (max 2MB).");
}
// Generate unique filename
$ext = pathinfo($file['name'], PATHINFO_EXTENSION);
$filename = uniqid('student_') . '.' . $ext;
$dest = 'uploads/' . $filename;
if (move_uploaded_file($file['tmp_name'], $dest)) {
// Save $filename to DB ← your next step
echo "Upload successful!";
}
}
?>
<div class="container mt-5"style="max-width:400px;">
    <form action="" method ="post">
        <h3 class ="mb-3">Update profile </h3>

        <input type="text" class="form-control mb-3" name="name" placeholder="Name">

<input type="file" name="file">

<button class="btn btn-primary w-100">Update</buttton>
</form>
</div>
<?php



?>