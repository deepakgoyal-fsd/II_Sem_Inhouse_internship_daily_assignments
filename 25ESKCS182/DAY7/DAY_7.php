<?php
$title = $email = $phone = $experience = $department = $coverletter = "";
$errors = [];

if (isset($_POST['apply'])) {
    $title = trim($_POST['title']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $experience = isset($_POST['experience']) ? $_POST['experience'] : "";
    $department = $_POST['department'];
    $coverletter = trim($_POST['coverletter']);

    // Server-side validations mapping original ruleset structure
    if ($title == "") {
        $errors[] = "Applicant title/name is required.";
    } else if (preg_match('/[0-9]/', $title)) {
        $errors[] = "Applicant title/name should not contain numeric characters.";
    }

    if ($email == "") {
        $errors[] = "Email address tracking is required.";
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Enter a valid email structure.";
    }

    if ($phone == "") {
        $errors[] = "Primary phone parameter is required.";
    } else if (!preg_match('/^[0-9]{10}$/', $phone)) {
        $errors[] = "Phone number must be exactly 10 digits.";
    }

    if ($experience == "") {
        $errors[] = "Please select your experience range.";
    }

    if ($department == "") {
        $errors[] = "Please select a target department cluster.";
    }

    if ($coverletter == "") {
        $errors[] = "Cover letter statement text block is required.";
    } else if (strlen($coverletter) < 10) {
        $errors[] = "Cover letter details must contain at least 10 letters.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Talent Acquisition Portal</title>
    
    <!-- Bootstrap 5 Integration Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #eef2f7;
            font-family: Arial, sans-serif;
        }

        .container-box {
            width: 700px;
            margin: 40px auto;
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0px 0px 10px rgba(0,0,0,0.15);
        }

        h2 {
            text-align: center;
            margin-bottom: 25px;
            color: #2c3e50;
        }

        .error-box {
            background: #fdf2f2;
            color: #b91c1c;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            border: 1px solid #fca5a5;
        }

        .success-box {
            background: #f0fdf4;
            padding: 20px;
            border-radius: 10px;
            border: 1px solid #bbf7d0;
        }

        .resume-badge {
            margin-top: 10px;
            display: inline-block;
            padding: 8px 12px;
            background: #e0f2fe;
            color: #0369a1;
            border-radius: 6px;
            font-weight: bold;
        }
    </style>
</head>

<body>

<div class="container-box">

<?php
// Conditional Block Evaluation: Render metrics summary panel upon success
if (isset($_POST['apply']) && count($errors) == 0) {
?>

    <div class="success-box">
        <h2>Application Received Successfully</h2>
        <hr>
        <p><b>Applicant Identity:</b> <?php echo htmlspecialchars($title); ?></p>
        <p><b>Communications Email:</b> <?php echo htmlspecialchars($email); ?></p>
        <p><b>Contact Registry:</b> <?php echo htmlspecialchars($phone); ?></p>
        <p><b>Experience Bracket:</b> <?php echo htmlspecialchars($experience); ?></p>
        <p><b>Assigned Department:</b> <?php echo htmlspecialchars($department); ?></p>
        <p><b>Cover Letter Statement:</b><br><?php echo nl2br(htmlspecialchars($coverletter)); ?></p>

        <?php 
        // File attachment array validation checks matching your template structure
        if ($_FILES['resume']['name'] != "") { 
        ?>
            <p><b>Uploaded Document Package:</b></p>
            <div class="resume-badge">
                📄 <?php echo htmlspecialchars($_FILES['resume']['name']); ?>
            </div>
        <?php 
        } 
        ?>

        <br><br>
        <div class="text-center">
            <a href="" class="btn btn-primary px-4">Submit Another Profile</a>
        </div>
    </div>

<?php 
} else { 
?>

    <h2>Job Application Form</h2>

    <?php 
    // Render error checklist stream if validation criteria fails
    if (count($errors) > 0) { 
    ?>
        <div class="error-box">
            <b>Please adjust the following requirements before system ingest:</b>
            <ul class="mb-0 mt-2">
                <?php
                foreach ($errors as $e) {
                    echo "<li>" . htmlspecialchars($e) . "</li>";
                }
                ?>
            </ul>
        </div>
    <?php 
    } 
    ?>

    <!-- File encoding architecture mapped directly to template structure -->
    <form method="POST" enctype="multipart/form-data">

        <div class="mb-3">
            <label class="form-label">Full Name / Title</label>
            <input type="text" 
                   class="form-control" 
                   name="title" 
                   value="<?php echo htmlspecialchars($title); ?>">
        </div>

        <div class="mb-3">
            <label class="form-label">Email Address</label>
            <input type="email" 
                   class="form-control" 
                   name="email" 
                   value="<?php echo htmlspecialchars($email); ?>">
        </div>

        <div class="mb-3">
            <label class="form-label">Phone Number</label>
            <input type="text" 
                   class="form-control" 
                   name="phone" 
                   value="<?php echo htmlspecialchars($phone); ?>">
        </div>

        <div class="mb-3">
            <label class="form-label">Attach Resume / CV Document</label>
            <input type="file" 
                   class="form-control" 
                   name="resume">
        </div>

        <div class="mb-3">
            <label class="form-label">Experience Tier</label>
            <br>
            <input type="radio" 
                   name="experience" 
                   value="Junior" 
                   <?php if ($experience == "Junior") echo "checked"; ?>> Junior (0-2 Yrs)
            &nbsp;&nbsp;
            <input type="radio" 
                   name="experience" 
                   value="Mid-Level" 
                   <?php if ($experience == "Mid-Level") echo "checked"; ?>> Mid-Level (2-5 Yrs)
            &nbsp;&nbsp;
            <input type="radio" 
                   name="experience" 
                   value="Senior" 
                   <?php if ($experience == "Senior") echo "checked"; ?>> Senior (5+ Yrs)
        </div>

        <div class="mb-3">
            <label class="form-label">Target Organizational Track</label>
            <select class="form-select" name="department">
                <option value="">Select Division Team</option>
                <option value="Engineering" <?php if ($department == "Engineering") echo "selected"; ?>>Engineering</option>
                <option value="Product Operations" <?php if ($department == "Product Operations") echo "selected"; ?>>Product Operations</option>
                <option value="Marketing & Design" <?php if ($department == "Marketing & Design") echo "selected"; ?>>Marketing & Design</option>
                <option value="Human Capital" <?php if ($department == "Human Capital") echo "selected"; ?>>Human Capital</option>
                <option value="Finance Operations" <?php if ($department == "Finance Operations") echo "selected"; ?>>Finance Operations</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Cover Letter Statement Details</label>
            <textarea class="form-control" 
                      name="coverletter" 
                      rows="4"><?php echo htmlspecialchars($coverletter); ?></textarea>
        </div>

        <div class="text-center">
            <button type="submit" 
                    name="apply" 
                    class="btn btn-success px-5">Submit Application</button>
            <button type="reset" 
                    class="btn btn-secondary px-5">Reset</button>
        </div>

    </form>

<?php 
} 
?>

</div>

</body>
</html>
