<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $txtName = $_POST["txtName"];
    $txtEmail = $_POST["txtEmail"];
    $PhoneNo = $_POST["PhoneNo"];
    $Password = $_POST["Password"];

    if (empty($txtName)) {
        echo "Name is empty <br>";
    }
    elseif (!filter_var($txtEmail, FILTER_VALIDATE_EMAIL)) {
        echo "Email is invalid <br>";
    }
    elseif (strlen($PhoneNo) != 10 || !ctype_digit($PhoneNo)) {
        echo "Phone number is invalid <br>";
    }
    elseif (
        strlen($Password) < 8 ||
        !preg_match('/[A-Z]/', $Password) ||
        !preg_match('/[a-z]/', $Password) ||
        !preg_match('/[0-9]/', $Password) ||
        !preg_match('/[\W]/', $Password)
    ) {
        echo "Password is invalid <br>";
    }
    else {
        echo "All values are valid.<br><br>";
    }

    echo "<h3>Values Received</h3>";
    echo "Name : $txtName <br>";
    echo "Email : $txtEmail <br>";
    echo "Phone : $PhoneNo <br>";
    echo "Password : $Password <br>";
}
else {
    echo "Please submit the form first.";
}

?>
