<?php

include "db.php";

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Get Form Data
    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $phone = trim($_POST["phone"]);
    $gender = trim($_POST["gender"]);
    $course = trim($_POST["course"]);
    $address = trim($_POST["address"]);

    // Validation
    if (
        empty($name) ||
        empty($email) ||
        empty($phone) ||
        empty($gender) ||
        empty($course) ||
        empty($address)
    ) {

        echo "<script>
                alert('All fields are required!');
                window.location='index.php';
              </script>";
        exit();
    }

    // Insert Query
    $sql = "INSERT INTO students
            (name, email, phone, gender, course, address)
            VALUES
            (?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);

    $stmt->bind_param(
        "ssssss",
        $name,
        $email,
        $phone,
        $gender,
        $course,
        $address
    );

    if ($stmt->execute()) {

        echo "<script>
                alert('Student Registered Successfully!');
                window.location='students.php';
              </script>";

    } else {

        echo "<script>
                alert('Registration Failed!');
                window.location='index.php';
              </script>";

    }

    $stmt->close();
    $conn->close();

} else {

    header("Location: index.php");
    exit();

}

?>