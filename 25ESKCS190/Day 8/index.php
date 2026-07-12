<?php
session_start();

$error = "";

if (isset($_POST["btn_submit"])) {

    $name = trim($_POST["user_name"]);
    $email = trim($_POST["user_email"]);
    $branch = trim($_POST["user_branch"]);
    $cgpa = trim($_POST["user_cgpa"]);
    $college = trim($_POST["user_college"]);

    if (empty($name) || empty($email) || empty($branch) || empty($cgpa) || empty($college)) {
        $error = "All fields are required.";
    } else {

        $_SESSION["student"] = array(
            "name" => $name,
            "email" => $email,
            "branch" => $branch,
            "cgpa" => $cgpa,
            "college" => $college
        );

        header("Location: confirmation.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management Portal</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="card shadow p-4">

        <h2 class="text-center mb-4">
            Student Registration Form
        </h2>

        <?php
        if ($error != "") {
            echo "<div class='alert alert-danger'>$error</div>";
        }
        ?>

        <form action="" method="POST">

            <div class="mb-3">
                <label class="form-label">Name</label>
                <input
                    type="text"
                    class="form-control"
                    name="user_name"
                    placeholder="Enter your full name">
            </div>

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input
                    type="email"
                    class="form-control"
                    name="user_email"
                    placeholder="Enter your email">
            </div>

            <div class="mb-3">
                <label class="form-label">Branch</label>
                <input
                    type="text"
                    class="form-control"
                    name="user_branch"
                    placeholder="Enter your branch">
            </div>

            <div class="mb-3">
                <label class="form-label">CGPA</label>
                <input
                    type="number"
                    step="0.01"
                    class="form-control"
                    name="user_cgpa"
                    placeholder="Enter your CGPA">
            </div>

            <div class="mb-3">
                <label class="form-label">College</label>
                <input
                    type="text"
                    class="form-control"
                    name="user_college"
                    placeholder="Enter your college name">
            </div>

            <button
                type="submit"
                name="btn_submit"
                class="btn btn-primary w-100">
                Submit
            </button>

        </form>

    </div>

</div>

</body>
</html>