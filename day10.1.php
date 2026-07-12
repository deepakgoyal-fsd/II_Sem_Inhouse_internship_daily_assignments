<?php
include("db_connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $branch = mysqli_real_escape_string($conn, $_POST['branch']);
    $cgpa = mysqli_real_escape_string($conn, $_POST['cgpa']);
    $status = mysqli_real_escape_string($conn, $_POST['status']);

    // Upload Photo
    $photo = "";

    if (isset($_FILES['photo']) && $_FILES['photo']['error'] == 0) {

        $photo = time() . "_" . $_FILES['photo']['name'];

        $target = "upload/" . $photo;

        move_uploaded_file($_FILES['photo']['tmp_name'], $target);
    }

    $sql = "INSERT INTO students(name,email,branch,cgpa,photo,status)
            VALUES('$name','$email','$branch','$cgpa','$photo','$status')";

    if (mysqli_query($conn, $sql)) {

        header("Location: index.php");
        exit();

    } else {

        echo "Error: " . mysqli_error($conn);

    }

}

mysqli_close($conn);
?>
