<?php

$email = $_POST['email'];

$sql = "SELECT * FROM users
        WHERE email = '$email'
        LIMIT 1";

$result = mysqli_query($conn, $sql);

$user = mysqli_fetch_assoc($result);

if ($user &&
    $user['password'] == $_POST['password']) {

    // Success!
    header("Location: dashboard.php");

} else {

    $error = "Invalid credentials.";

}

?>