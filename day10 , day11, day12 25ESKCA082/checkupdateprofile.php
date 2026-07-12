<?php
session_start();
include("DBconnect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = $_SESSION['id'];
    $name = mysqli_real_escape_string($conn, $_POST['name']);

    $photo = $_FILES['photo']['name'];
    $temp = $_FILES['photo']['tmp_name'];

    if ($photo != "") {

        if (!is_dir("uploads")) {
            mkdir("uploads", 0777, true);
        }

        move_uploaded_file($temp, "uploads/" . $photo);

        $query = "UPDATE user
                  SET name='$name', photo='$photo'
                  WHERE id='$id'";
    } else {

        $query = "UPDATE user
                  SET name='$name'
                  WHERE id='$id'";
    }

    if (mysqli_query($conn, $query)) {

        $_SESSION['name'] = $name;

        header("Location: dashboard.php");
        exit();

    } else {

        echo mysqli_error($conn);

    }
}
?>