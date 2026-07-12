<?php
session_start();
include("SQLconnect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $user_id = $_SESSION['user_id'];

    if ($name == "") {
        echo "Name cannot be empty";
    } else {
        $updateQuery = "UPDATE user SET name = '$name' WHERE id = '$user_id'";
        mysqli_query($conn, $updateQuery);

        // Optional: handle profile picture upload
        if (isset($_FILES['file']) && $_FILES['file']['error'] == 0) {
            $allowed = ['jpg', 'jpeg', 'png', 'gif'];
            $ext = strtolower(pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION));

            if (in_array($ext, $allowed)) {
                $newFileName = "user_" . $user_id . "." . $ext;
                $uploadPath = "uploads/" . $newFileName;
                move_uploaded_file($_FILES['file']['tmp_name'], $uploadPath);

                $updatePicQuery = "UPDATE user SET profile_pic = '$newFileName' WHERE id = '$user_id'";
                mysqli_query($conn, $updatePicQuery);
            }
        }

        $_SESSION['user_name'] = $name;
        header("Location: success_up.php");
        exit();
    }
}
?>
