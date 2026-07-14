<?php

include("db_connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $branch = mysqli_real_escape_string($conn, $_POST['branch']);
    $cgpa = $_POST['cgpa'];

    $sql = "INSERT INTO students(name, email, branch, cgpa)
            VALUES('$name', '$email', '$branch', '$cgpa')";

    if (mysqli_query($conn, $sql)) {

        echo "
        <!DOCTYPE html>
        <html>
        <head>
            <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css' rel='stylesheet'>
        </head>
        <body class='bg-light'>
            <div class='container mt-5'>
                <div class='alert alert-success'>
                    <h4>Student Registered Successfully!</h4>
                </div>

                <a href='index.php' class='btn btn-primary'>Register Another Student</a>
                <a href='students.php' class='btn btn-success'>View Students</a>
            </div>
        </body>
        </html>
        ";

    } else {

        echo "
        <!DOCTYPE html>
        <html>
        <head>
            <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css' rel='stylesheet'>
        </head>
        <body class='bg-light'>
            <div class='container mt-5'>
                <div class='alert alert-danger'>
                    Error: " . mysqli_error($conn) . "
                </div>

                <a href='index.php' class='btn btn-primary'>Go Back</a>
            </div>
        </body>
        </html>
        ";

    }
}

mysqli_close($conn);

?>