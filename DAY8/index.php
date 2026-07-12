<?php
// 1. Initialize variables to remember user input and store errors
$name = $gender = $course = $address = '';
$errors = [];
$is_success = false;

// 2. Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Capture data
    $name = trim($_POST['name'] ?? '');
    $gender = $_POST['gender'] ?? '';
    $course = $_POST['course'] ?? '';
    $address = trim($_POST['address'] ?? '');

    // 3. Validation Logic (Assigning errors to specific keys)
    
    // Name Validation
    if (empty($name)) {
        $errors['name'] = "Name is required.";
    } elseif (!preg_match("/^[a-zA-Z\s]+$/", $name)) {
        $errors['name'] = "Name cannot contain numbers or special characters.";
    }

    // Gender Validation
    if (empty($gender)) {
        $errors['gender'] = "Please select a gender.";
    }

    // Address Validation
    if (empty($address)) {
        $errors['address'] = "Address is required.";
    } elseif (strlen($address) < 15) {
        $errors['address'] = "Address is too short. It must be at least 15 characters long.";
    }

    // If there are no errors, set success flag to true
    if (empty($errors)) {
        $is_success = true;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration System</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5" style="max-width: 600px;">
        
        <?php if ($is_success): ?>
            <!-- SUCCESS CONFIRMATION VIEW -->
            <div class="card shadow-sm border-success">
                <div class="card-header bg-success text-white">
                    <h3 class="mb-0 text-center">Registration Confirmed</h3>
                </div>
                <div class="card-body">
                    <div class="text-center mb-4">
                        <img src="https://via.placeholder.com/120" class="rounded-circle border border-3" alt="Profile Placeholder">
                        <p class="text-muted small mt-2">Profile Photo (Placeholder)</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><strong>Full Name:</strong> <?php echo htmlspecialchars($name); ?></li>
                        <li class="list-group-item"><strong>Gender:</strong> <?php echo htmlspecialchars($gender); ?></li>
                        <li class="list-group-item"><strong>Course:</strong> <?php echo htmlspecialchars($course ?: 'Not Selected'); ?></li>
                        <li class="list-group-item"><strong>Address:</strong><br> <?php echo nl2br(htmlspecialchars($address)); ?></li>
                    </ul>
                </div>
                <div class="card-footer text-center">
                    <a href="index.php" class="btn btn-outline-success">Register Another Student</a>
                </div>
            </div>

        <?php else: ?>
            <!-- REGISTRATION FORM VIEW -->
            <div class="card shadow-sm">
                <div class="card-header bg-dark text-white">
                    <h3 class="mb-0">Student Registration</h3>
                </div>
                <div class="card-body">
                    <form action="index.php" method="POST" enctype="multipart/form-data" novalidate>
                        
                        <!-- Full Name -->
                        <div class="mb-3">
                            <label for="name" class="form-label">Full Name</label>
                            <input type="text" 
                                   class="form-control <?php echo isset($errors['name']) ? 'is-invalid' : ''; ?>" 
                                   id="name" name="name" 
                                   placeholder="Enter your full name" 
                                   value="<?php echo htmlspecialchars($name); ?>">
                            <!-- Inline Error Message -->
                            <?php if(isset($errors['name'])): ?>
                                <div class="invalid-feedback"><?php echo $errors['name']; ?></div>
                            <?php endif; ?>
                        </div>

                        <!-- Photo Upload UI -->
                        <div class="mb-3">
                            <label for="profile_photo" class="form-label">Profile Photo</label>
                            <input class="form-control" type="file" id="profile_photo" name="profile_photo" accept="image/*">
                            <div class="form-text">Upload a profile picture (UI preview only).</div>
                        </div>

                        <!-- Gender (Radio Buttons) -->
                        <div class="mb-3">
                            <label class="form-label d-block">Gender</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input <?php echo isset($errors['gender']) ? 'is-invalid' : ''; ?>" type="radio" name="gender" id="male" value="Male" <?php echo ($gender == 'Male') ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="male">Male</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input <?php echo isset($errors['gender']) ? 'is-invalid' : ''; ?>" type="radio" name="gender" id="female" value="Female" <?php echo ($gender == 'Female') ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="female">Female</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input <?php echo isset($errors['gender']) ? 'is-invalid' : ''; ?>" type="radio" name="gender" id="other" value="Other" <?php echo ($gender == 'Other') ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="other">Other</label>
                            </div>
                            <!-- Inline Error Message for Radio Buttons -->
                            <?php if(isset($errors['gender'])): ?>
                                <div class="invalid-feedback d-block"><?php echo $errors['gender']; ?></div>
                            <?php endif; ?>
                        </div>

                        <!-- Course (Dropdown) -->
                        <div class="mb-3">
                            <label for="course" class="form-label">Course</label>
                            <select class="form-select" id="course" name="course">
                                <option value="" selected disabled>Select a course...</option>
                                <option value="Web Development" <?php echo ($course == 'Web Development') ? 'selected' : ''; ?>>Web Development</option>
                                <option value="Data Science" <?php echo ($course == 'Data Science') ? 'selected' : ''; ?>>Data Science</option>
                                <option value="Graphic Design" <?php echo ($course == 'Graphic Design') ? 'selected' : ''; ?>>Graphic Design</option>
                            </select>
                        </div>

                        <!-- Address (Textarea) -->
                        <div class="mb-4">
                            <label for="address" class="form-label">Address</label>
                            <textarea class="form-control <?php echo isset($errors['address']) ? 'is-invalid' : ''; ?>" 
                                      id="address" name="address" rows="3" 
                                      placeholder="Enter full address..."><?php echo htmlspecialchars($address); ?></textarea>
                            <!-- Inline Error Message -->
                            <?php if(isset($errors['address'])): ?>
                                <div class="invalid-feedback"><?php echo $errors['address']; ?></div>
                            <?php endif; ?>
                        </div>

                        <button type="submit" class="btn btn-success w-100">Submit Registration</button>
                    </form>
                </div>
            </div>
        <?php endif; ?>

    </div>
</body>
</html>