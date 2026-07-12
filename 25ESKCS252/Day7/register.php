<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errors = [];

    // Capturing Data
    $name = $_POST['name'] ?? '';
    $gender = $_POST['gender'] ?? '';
    $course = $_POST['course'] ?? '';
    $address = $_POST['address'] ?? '';
    $photo = $_FILES['profile_pic']['name'] ?? '';

    
    if (preg_match("/[0-9]/", $name)) {
        $errors[] = "Name cannot contain numbers.";
    }
    if (strlen($address) < 10) {
        $errors[] = "Address must be at least 10 characters long.";
    }
    if (empty($gender)) {
        $errors[] = "Please select a gender.";
    }

    
    if (!empty($errors)) {
        echo '<div class="alert alert-danger"><strong>Errors:</strong><ul>';
        foreach ($errors as $error) { echo "<li>$error</li>"; }
        echo '</ul><a href="index.php" class="btn btn-secondary">Go Back</a></div>';
    } else {
        echo '<div class="card p-4">';
        echo '<h2>Registration Successful!</h2>';
        echo "<p><strong>Name:</strong> $name</p>";
        echo "<p><strong>Gender:</strong> $gender</p>";
        echo "<p><strong>Course:</strong> $course</p>";
        echo "<p><strong>Address:</strong> $address</p>";
        echo "<p><strong>Photo:</strong> $photo (Placeholder)</p>";
        echo '<a href="index.php" class="btn btn-primary">Register Another</a></div>';
    }
}
?>
</div>
</body>
</html>