<?php
include("db_connect.php");

if (isset($_GET['id'])) {

    $id = $_GET['id'];

    // Get photo name
    $result = mysqli_query($conn, "SELECT photo FROM students WHERE id='$id'");
    $row = mysqli_fetch_assoc($result);

    // Delete photo from upload folder
    if (!empty($row['photo']) && file_exists("upload/" . $row['photo'])) {
        unlink("upload/" . $row['photo']);
    }

    // Delete student record
    $sql = "DELETE FROM students WHERE id='$id'";

    if (mysqli_query($conn, $sql)) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
