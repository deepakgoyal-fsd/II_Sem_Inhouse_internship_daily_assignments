<?php

$error = "";

$name = "";
$email = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = mysqli_real_escape_string($conn, $_POST["name"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);

    // Validation
    if (empty($name)) {
        $error .= "Name is required.<br>";
    }

    if (empty($email)) {
        $error .= "Email is required.<br>";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error .= "Invalid Email Format.<br>";
    }
    if($user){

    }



    if ($error == "") {

        $selectQuery = "SELECT INTO user(name, email)
                        VALUES('$name', '$email')";

        $result = mysqli_query($conn, $insertQuery);

        if ($result) {
            header("Location: success.php");
            exit();
        } else {
            echo "Error occurred while storing data.<br>";
            echo "Error: " . mysqli_error($conn);
        }

    } else {
        echo $error;
    }

}
?>