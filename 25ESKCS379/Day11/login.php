<?php
session_start();
include "db.php";

if (isset($_SESSION["user_email"])) {
    header("Location: dashboard.php");
    exit();
}

$error = "";

if (isset($_POST["login"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);

        $_SESSION["user_id"] = $user["id"];
        $_SESSION["user_name"] = $user["name"];
        $_SESSION["user_email"] = $user["email"];
        $_SESSION["login_time"] = date("d M Y, h:i A");

        header("Location: dashboard.php");
        exit();
    } else {
        $error = "Invalid email or password.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login - Student Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body class="login-page">
    <div class="container">
        <div class="row justify-content-center align-items-center min-vh-100">
            <div class="col-md-5">
                <div class="card shadow">
                    <div class="card-body p-4">
                        <h3 class="text-center mb-2">Student Login</h3>
                        <p class="text-center text-muted mb-4">Secure Student Management System</p>

                        <?php if ($error != "") { ?>
                            <div class="alert alert-danger"><?php echo $error; ?></div>
                        <?php } ?>

                        <form method="POST">
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" placeholder="Enter email" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Enter password" required>
                            </div>

                            <button type="submit" name="login" class="btn btn-primary w-100">Login</button>
                        </form>

                        <div class="alert alert-info mt-4 mb-0">
                            <strong>Demo Login:</strong><br>
                            Email: admin@example.com<br>
                            Password: 12345
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
