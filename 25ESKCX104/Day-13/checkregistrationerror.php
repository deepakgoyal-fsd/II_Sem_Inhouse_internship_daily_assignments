<?php

include("db_connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Get Form Data
    $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email    = mysqli_real_escape_string($conn, $_POST['email']);
    $phone    = mysqli_real_escape_string($conn, $_POST['phone']);
    $address  = mysqli_real_escape_string($conn, $_POST['address']);
    $city     = mysqli_real_escape_string($conn, $_POST['city']);
    $state    = mysqli_real_escape_string($conn, $_POST['state']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Check Empty Fields
    if (
        empty($fullname) ||
        empty($username) ||
        empty($email) ||
        empty($phone) ||
        empty($address) ||
        empty($city) ||
        empty($state) ||
        empty($password)
    ) {

        echo "<script>
                alert('All fields are required!');
                window.history.back();
              </script>";
        exit();

    }

    // Check Duplicate Username
    $check = "SELECT * FROM users WHERE username='$username' OR email='$email'";
    $result = mysqli_query($conn, $check);

    if (mysqli_num_rows($result) > 0) {

        echo "<script>
                alert('Username or Email already exists!');
                window.history.back();
              </script>";
        exit();

    }

    // Insert Data
    $insert = "INSERT INTO users
    (fullname, username, email, phone, address, city, state, password)
    VALUES
    ('$fullname','$username','$email','$phone','$address','$city','$state','$password')";

    if (mysqli_query($conn, $insert)) {

        echo "<script>
                alert('Registration Successful!');
                window.location='login.php';
              </script>";

    } else {

        echo "Database Error : " . mysqli_error($conn);

    }

    mysqli_close($conn);

} else {

    header("Location: registration.php");
    exit();

}

?>