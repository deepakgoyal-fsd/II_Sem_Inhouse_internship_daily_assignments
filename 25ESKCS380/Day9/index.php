<?php
include "db.php";

$msg = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $cgpa = $_POST["cgpa"];
    $branch = $_POST["branch"];

    if ($name && $email && $cgpa && $branch) {

        $stmt = $conn->prepare(
            "INSERT INTO students(name,email,cgpa,branch) VALUES(?,?,?,?)"
        );

        $stmt->bind_param("ssds", $name, $email, $cgpa, $branch);

        if ($stmt->execute()) {
            $msg = "Registration Successful!";
        } else {
            $msg = "Email already registered!";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Portal</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>

<body class="bg-light">

<nav class="navbar navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand">🎓 Student Portal</a>
        <a href="students.php" class="btn btn-warning">Students</a>
    </div>
</nav>

<div class="container mt-5">

    <?php if($msg): ?>
        <div class="alert alert-success">
            <?= $msg ?>
        </div>
    <?php endif; ?>

    <div class="card shadow p-4">

        <h3>Student Registration</h3>

        <form method="POST">

            <input class="form-control my-2"
                   name="name"
                   placeholder="Name"
                   required>

            <input class="form-control my-2"
                   type="email"
                   name="email"
                   placeholder="Email"
                   required>

            <input class="form-control my-2"
                   type="number"
                   step="0.01"
                   name="cgpa"
                   placeholder="CGPA"
                   required>

            <select class="form-select my-2"
                    name="branch"
                    required>

                <option value="">Select Branch</option>
                <option>CSE</option>
                <option>IT</option>
                <option>ECE</option>
                <option>ME</option>

            </select>

            <button class="btn btn-primary w-100">
                Register
            </button>

        </form>

    </div>

</div>

</body>
</html>