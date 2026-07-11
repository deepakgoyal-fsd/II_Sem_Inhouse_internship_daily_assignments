<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">

    <div class="card shadow p-4 mx-auto" style="max-width:650px;">

        <h2 class="text-center mb-4">Student Registration</h2>

        <form action="" method="post" enctype="multipart/form-data">

            <div class="mb-3">
                <label class="form-label">Student Name</label>
                <input type="text" class="form-control" name="name">
            </div>

            <div class="mb-3">
                <label class="form-label">Roll Number</label>
                <input type="text" class="form-control" name="roll">
            </div>

            <div class="mb-3">
                <label class="form-label">Mobile Number</label>
                <input type="text" class="form-control" name="mobile">
            </div>

            <div class="mb-3">
                <label class="form-label">Gender</label><br>
                <input type="radio" name="gender" value="Male"> Male
                <input type="radio" name="gender" value="Female" class="ms-3"> Female
            </div>

            <div class="mb-3">
                <label class="form-label">Course</label>

                <select class="form-select" name="course">
                    <option>CSE</option>
                    <option>AI</option>
                    <option>DS</option>
                    <option>IOT</option>
                    <option>ECE</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Address</label>

                <textarea class="form-control"
                rows="3"
                name="address"></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Upload Photo</label>

                <input type="file"
                class="form-control"
                name="photo">
            </div>

            <button class="btn btn-primary w-100">
                Register
            </button>

        </form>

    </div>

</div>

<?php

if($_SERVER["REQUEST_METHOD"]=="POST"){

    $name = $_POST["name"];
    $roll = $_POST["roll"];
    $mobile = $_POST["mobile"];
    $gender = $_POST["gender"];
    $course = $_POST["course"];
    $address = $_POST["address"];

    $photo = $_FILES["photo"]["name"];

    echo "<h3>Student Details</h3>";

    echo "Name : $name <br>";
    echo "Roll No : $roll <br>";
    echo "Mobile : $mobile <br>";
    echo "Gender : $gender <br>";
    echo "Course : $course <br>";
    echo "Address : $address <br>";
    echo "Photo : $photo <br>";

}
?>

</body>
</html>