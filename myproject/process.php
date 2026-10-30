<?php
require_once 'db.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Sanitize user inputs
    $username = trim($_POST['username'] ?? '');
    $email    = filter_var(trim($_POST['email'] ?? ''), FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'] ?? '';
    $fullName = trim($_POST['fullName'] ?? '');
    $phone    = trim($_POST['phone'] ?? '');
    $dob      = trim($_POST['dob'] ?? '');
    $bio      = trim($_POST['bio'] ?? '');

    // Server-side validation
    if (empty($username) || empty($email) || empty($password) || empty($fullName) || empty($phone) || empty($dob)) {
        die("Please fill in all required fields.");
    }

    // Securely hash the password
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    try {
        // SQL Prepared Statement to safely insert data into MySQL
        $sql = "INSERT INTO users (username, email, password, full_name, phone, dob, bio) 
                VALUES (:username, :email, :password, :full_name, :phone, :dob, :bio)";
        
        $stmt = $pdo->prepare($sql);
        
        $stmt->execute([
            ':username'  => $username,
            ':email'     => $email,
            ':password'  => $hashedPassword,
            ':full_name' => $fullName,
            ':phone'     => $phone,
            ':dob'       => $dob,
            ':bio'       => $bio
        ]);

        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <title>Registration Successful</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        </head>
        <body class="bg-light d-flex align-items-center min-vh-100">
            <div class="container text-center">
                <div class="card shadow border-0 p-5 mx-auto rounded-4" style="max-width: 500px;">
                    <div class="text-success mb-3" style="font-size: 3rem;">✓</div>
                    <h3 class="fw-bold text-dark mb-2">Registration Complete!</h3>
                    <p class="text-muted">Account successfully saved to the database for <strong><?php echo htmlspecialchars($username); ?></strong>.</p>
                    <a href="index.php" class="btn btn-primary btn-lg mt-3">Register Another User</a>
                </div>
            </div>
        </body>
        </html>
        <?php

    } catch (PDOException $e) {
        // Handle unique constraint violations (e.g., duplicate username/email)
        if ($e->getCode() == 23000) {
            die("Error: Username or Email is already registered. <a href='index.php'>Go back</a>");
        } else {
            die("Database Insert Error: " . $e->getMessage());
        }
    }

} else {
    header("Location: index.php");
    exit();
}
?>