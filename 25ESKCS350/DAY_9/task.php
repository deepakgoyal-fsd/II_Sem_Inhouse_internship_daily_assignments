<?php
// Using distinct nomenclature to maintain a unique codebase
$inputName = "";
$inputEmail = "";
$inputPhone = "";
$selectedGender = "";
$selectedCourse = "";
$inputAddress = "";
$registrationDate = "";
$validationErrors = [];
$uploadedPhotoPath = "";

if (isset($_POST['btn_submit'])) {
    $inputName = trim($_POST['student_name']);
    $inputEmail = trim($_POST['student_email']);
    $inputPhone = trim($_POST['student_phone']);
    $selectedGender = isset($_POST['student_gender']) ? $_POST['student_gender'] : "";
    $selectedCourse = $_POST['student_course'];
    $inputAddress = trim($_POST['student_address']);
    $registrationDate = $_POST['reg_date'];

    // Name Validation
    if ($inputName == "") {
        $validationErrors[] = "Full name field cannot be empty.";
    } elseif (!preg_match("/^[a-zA-Z ]+$/", $inputName)) {
        $validationErrors[] = "The name field must only contain alphabetic characters.";
    }

    // Email Validation
    if ($inputEmail == "") {
        $validationErrors[] = "An email address is required.";
    } elseif (!filter_var($inputEmail, FILTER_VALIDATE_EMAIL)) {
        $validationErrors[] = "Please enter a properly formatted email address.";
    }

    // Phone Validation
    if ($inputPhone == "") {
        $validationErrors[] = "A contact phone number is required.";
    } elseif (!preg_match("/^[0-9]{10}$/", $inputPhone)) {
        $validationErrors[] = "The phone number must contain exactly 10 numerical digits.";
    }

    // Choice Box Validations
    if ($selectedGender == "") {
        $validationErrors[] = "Please select a gender option.";
    }
    if ($selectedCourse == "") {
        $validationErrors[] = "Please select an academic course from the menu.";
    }
    if ($inputAddress == "") {
        $validationErrors[] = "Residential address details are required.";
    }
    if ($registrationDate == "") {
        $validationErrors[] = "Please specify the registration calendar date.";
    }

    // Image Upload Pipeline
    if ($_FILES['student_photo']['name'] == "") {
        $validationErrors[] = "You must upload a profile photograph.";
    } else {
        $uploadDirectory = "student_attachments";
        if (!file_exists($uploadDirectory)) {
            mkdir($uploadDirectory, 0777, true);
        }

        $uploadedPhotoPath = $uploadDirectory . "/" . time() . "_" . basename($_FILES['student_photo']['name']);
        $fileExtension = strtolower(pathinfo($uploadedPhotoPath, PATHINFO_EXTENSION));

        if ($fileExtension != "jpg" && $fileExtension != "jpeg" && $fileExtension != "png") {
            $validationErrors[] = "Invalid file type. Only JPG, JPEG, and PNG extensions are allowed.";
        }

        if (count($validationErrors) == 0) {
            move_uploaded_file($_FILES["student_photo"]["tmp_name"], $uploadedPhotoPath);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Academic Enrollment Portal</title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #f4f7f6;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #334155;
        }

        .portal-wrapper {
            max-width: 680px;
            margin: 50px auto;
            background: #ffffff;
            padding: 35px;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(15, 23, 42, 0.08);
        }

        .portal-header {
            text-align: center;
            margin-bottom: 30px;
            color: #0f766e;
            font-weight: 700;
            border-bottom: 2px solid #f1f5f9;
            padding-bottom: 15px;
        }

        .error-container {
            background: #fef2f2;
            padding: 15px 20px;
            border-radius: 6px;
            color: #991b1b;
            margin-bottom: 25px;
            border: 1px solid #fee2e2;
        }

        .success-container {
            background: #f0fdf4;
            padding: 30px;
            border-radius: 8px;
            border: 1px solid #dcfce7;
        }

        .success-title {
            color: #166534;
            font-weight: 700;
            text-align: center;
            margin-bottom: 20px;
        }

        .avatar-preview {
            border-radius: 8px;
            border: 3px solid #e2e8f0;
            object-fit: cover;
        }

        .form-label {
            font-weight: 600;
            color: #475569;
        }

        .btn-custom-submit {
            background-color: #0f766e;
            color: #ffffff;
            transition: background 0.2s ease-in-out;
        }

        .btn-custom-submit:hover {
            background-color: #115e59;
            color: #ffffff;
        }
    </style>
</head>
<body>

<div class="portal-wrapper">

    <?php if (isset($_POST['btn_submit']) && count($validationErrors) == 0): ?>

        <div class="success-container">
            <h3 class="success-title">Enrollment Completed Successfully</h3>
            
            <table class="table table-striped table-bordered mt-4">
                <tr>
                    <th class="w-30 bg-light">Profile Image</th>
                    <td><img src="<?= htmlspecialchars($uploadedPhotoPath) ?>" width="160" class="avatar-preview" alt="Student Photo"></td>
                </tr>
                <tr>
                    <th class="bg-light">Student Name</th>
                    <td><?= htmlspecialchars($inputName) ?></td>
                </tr>
                <tr>
                    <th class="bg-light">Email Address</th>
                    <td><?= htmlspecialchars($inputEmail) ?></td>
                </tr>
                <tr>
                    <th class="bg-light">Contact Number</th>
                    <td><?= htmlspecialchars($inputPhone) ?></td>
                </tr>
                <tr>
                    <th class="bg-light">Date Registered</th>
                    <td><?= htmlspecialchars($registrationDate) ?></td>
                </tr>
                <tr>
                    <th class="bg-light">Gender</th>
                    <td><?= htmlspecialchars($selectedGender) ?></td>
                </tr>
                <tr>
                    <th class="bg-light">Course Program</th>
                    <td><?= htmlspecialchars($selectedCourse) ?></td>
                </tr>
                <tr>
                    <th class="bg-light">Permanent Address</th>
                    <td><?= nl2br(htmlspecialchars($inputAddress)) ?></td>
                </tr>
            </table>

            <div class="text-center mt-4">
                <a href="" class="btn btn-outline-secondary">Add Another Record</a>
            </div>
        </div>

    <?php else: ?>

        <h2 class="portal-header">Student Registration System</h2>

        <?php if (count($validationErrors) > 0): ?>
            <div class="error-container">
                <h6 class="fw-bold">Fix the following formatting errors:</h6>
                <ul class="mb-0 pt-1">
                    <?php foreach ($validationErrors as $err) echo "<li>" . htmlspecialchars($err) . "</li>"; ?>
                </ul>
            </div>
        <?php endif; ?>

        <form method="POST" enctype="multipart/form-data">
            
            <div class="mb-3">
                <label class="form-label">Full Name</label>
                <input type="text" class="form-control" name="student_name" value="<?= htmlspecialchars($inputName) ?>">
            </div>

            <div class="mb-3">
                <label class="form-label">Email ID</label>
                <input type="email" class="form-control" name="student_email" value="<?= htmlspecialchars($inputEmail) ?>">
            </div>

            <div class="mb-3">
                <label class="form-label">Phone Number</label>
                <input type="text" class="form-control" name="student_phone" maxlength="10" value="<?= htmlspecialchars($inputPhone) ?>">
            </div>

            <div class="mb-3">
                <label class="form-label">Profile Photograph</label>
                <input type="file" class="form-control" name="student_photo" accept=".jpg,.jpeg,.png">
            </div>

            <div class="mb-3">
                <label class="form-label">Registration Date</label>
                <input type="date" class="form-control" name="reg_date" value="<?= htmlspecialchars($registrationDate) ?>">
            </div>

            <div class="mb-3">
                <label class="form-label d-block">Gender Identification</label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="student_gender" value="Male" <?= $selectedGender == "Male" ? "checked" : "" ?>>
                    <label class="form-check-label">Male</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="student_gender" value="Female" <?= $selectedGender == "Female" ? "checked" : "" ?>>
                    <label class="form-check-label">Female</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="student_gender" value="Other" <?= $selectedGender == "Other" ? "checked" : "" ?>>
                    <label class="form-check-label">Other</label>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Course / Program Selection</label>
                <select class="form-select" name="student_course">
                    <option value="">-- Choose Course --</option>
                    <option value="B.Tech" <?= $selectedCourse == "B.Tech" ? "selected" : "" ?>>B.Tech</option>
                    <option value="BCA" <?= $selectedCourse == "BCA" ? "selected" : "" ?>>BCA</option>
                    <option value="BBA" <?= $selectedCourse == "BBA" ? "selected" : "" ?>>BBA</option>
                    <option value="MBA" <?= $selectedCourse == "MBA" ? "selected" : "" ?>>MBA</option>
                    <option value="MCA" <?= $selectedCourse == "MCA" ? "selected" : "" ?>>MCA</option>
                </select>
            </div>

            <div class="mb-4">
                <label class="form-label">Residential Address</label>
                <textarea class="form-control" name="student_address" rows="3"><?= htmlspecialchars($inputAddress) ?></textarea>
            </div>

            <div class="row g-2">
                <div class="col-6">
                    <button type="submit" name="btn_submit" class="btn btn-custom-submit w-100 py-2 fw-semibold">Save Registration</button>
                </div>
                <div class="col-6">
                    <button type="reset" class="btn btn-outline-secondary w-100 py-2 fw-semibold">Clear Form</button>
                </div>
            </div>

        </form>

    <?php endif; ?>

</div>

</body>
</html>
