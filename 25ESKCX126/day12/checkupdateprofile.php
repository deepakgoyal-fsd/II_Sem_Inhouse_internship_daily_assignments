<?php

session_start();

$error = "";

$id = $_SESSION['user_id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone_number']);

    // Check duplicate email
    $checkEmail = "SELECT id FROM user WHERE email='$email' AND id != '$id'";
    $emailResult = mysqli_query($conn, $checkEmail);

    if (mysqli_num_rows($emailResult) > 0) {

        echo "Email already exists.";
        exit();

    }

    $profilePic = "";

    // Upload image if selected
    if (isset($_FILES['profile_pic']) && $_FILES['profile_pic']['error'] == 0) {

        $uploadDir = "uploads/";

        if (!is_dir($uploadDir)) {
            mkdir($uploadDir);
        }

        $filename = time() . "_" . basename($_FILES["profile_pic"]["name"]);
        $targetFile = $uploadDir . $filename;

        move_uploaded_file($_FILES["profile_pic"]["tmp_name"], $targetFile);

        $profilePic = ", profile_pic='$targetFile'";
    }

    $updateQuery = "UPDATE user
                    SET
                    name='$name',
                    email='$email',
                    phone_number='$phone'
                    $profilePic
                    WHERE id='$id'";

    if (mysqli_query($conn, $updateQuery)) {

        $_SESSION['user_name'] = $name;
        $_SESSION['user_email'] = $email;

        header("Location: updateprofile.php?success=1");
        exit();

    } else {

        echo mysqli_error($conn);

    }

}
?>