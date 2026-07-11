<?php
include("db_connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = $_POST['id'];
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $branch = mysqli_real_escape_string($conn, $_POST['branch']);
    $cgpa = mysqli_real_escape_string($conn, $_POST['cgpa']);
    $status = mysqli_real_escape_string($conn, $_POST['status']);
    $old_photo = $_POST['old_photo'];

    // Keep old photo by default
    $photo = $old_photo;

    // Upload new photo if selected
    if (isset($_FILES['photo']) && $_FILES['photo']['error'] == 0) {

        $photo = time() . "_" . $_FILES['photo']['name'];
        $target = "upload/" . $photo;

        move_uploaded_file($_FILES['photo']['tmp_name'], $target);

        // Delete old photo
        if (!empty($old_photo) && file_exists("upload/" . $old_photo)) {
            unlink("upload/" . $old_photo);
        }
    }

    $sql = "UPDATE students SET
            name='$name',
            email='$email',
            branch='$branch',
            cgpa='$cgpa',
            photo='$photo',
            status='$status'
            WHERE id='$id'";

    if (mysqli_query($conn, $sql)) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
