<?php
session_start();

include("db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";

    $result = mysqli_query($conn, $sql);

    if (!$result) {
        die("Query Failed: " . mysqli_error($conn));
    }

    if (mysqli_num_rows($result) == 1) {

        $user = mysqli_fetch_assoc($result);

        $_SESSION['user_id'] = $user['id'];
        $_SESSION['name'] = $user['name'];
        $_SESSION['email'] = $user['email'];

        $date = date("Y-m-d H:i:s");

        mysqli_query($conn, "UPDATE users SET last_login='$date' WHERE id=".$user['id']);

        header("Location: dashboard.php");
        exit();

    } else {
        echo "<script>
                alert('Invalid Email or Password');
                window.location='login.php';
              </script>";
    }

} else {
    header("Location: login.php");
    exit();
}
?>