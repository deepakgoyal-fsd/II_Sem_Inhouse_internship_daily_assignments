<?php
$name = $email = $phone = $department = $experience = $bio = "";
$errors = [];

if (isset($_POST['submit'])) {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $department = isset($_POST['department']) ? $_POST['department'] : "";
    $experience = $_POST['experience'];
    $bio = trim($_POST['bio']);

    if ($name == "") {
        $errors[] = "Employee Name is required.";
    } else if (preg_match('/[0-9]/', $name)) {
        $errors[] = "Name should not contain numbers.";
    }

    if ($email == "") {
        $errors[] = "Work Email is required.";
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Enter a valid Email address.";
    }

    if ($phone == "") {
        $errors[] = "Contact Number is required.";
    } else if (!preg_match('/^[0-9]{10}$/', $phone)) {
        $errors[] = "Contact Number must be exactly 10 digits.";
    }

    if ($department == "") {
        $errors[] = "Please select a Department.";
    }

    if ($experience == "") {
        $errors[] = "Please select the Experience Level.";
    }

    if ($bio == "") {
        $errors[] = "Professional Bio is required.";
    } else if (strlen($bio) < 15) {
        $errors[] = "Professional Bio must be at least 15 characters.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Onboarding</title>
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
            box-shadow: 0px 4px 15px rgba(0,0,0,0.1);
        }
        h2 {
            text-align: center;
            margin-bottom: 25px;
            color: #1e3a8a;
        }
        .error-box {
            background: #fef2f2;
            color: #dc2626;
            border: 1px solid #fee2e2;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
        }
        .success-box {
            background: #f0fdf4;
            border: 1px solid #bbf7d0;
            padding: 20px;
            border-radius: 10px;
        }
        .success-box h2 {
            color: #15803d;
        }
        img {
            margin-top: 10px;
            border-radius: 10px;
            border: 2px solid #e2e8f0;
        }
    </style>
</head>
<body>

<div class="container-box">

<?php
if (isset($_POST['submit']) && count($errors) == 0) {
?>
    <div class="success-box">
        <h2>Onboarding Complete</h2>
        <p><b>Employee Name:</b> <?php echo htmlspecialchars($name); ?></p>
        <p><b>Work Email:</b> <?php echo htmlspecialchars($email); ?></p>
        <p><b>Contact Number:</b> <?php echo htmlspecialchars($phone); ?></p>
        <p><b>Department:</b> <?php echo htmlspecialchars($department); ?></p>
        <p><b>Experience Level:</b> <?php echo htmlspecialchars($experience); ?></p>
        <p><b>Professional Bio:</b><br><?php echo nl2br(htmlspecialchars($bio)); ?></p>

        <?php
        if (isset($_FILES['id_proof']['name']) && $_FILES['id_proof']['name'] != "") {
        ?>
            <p><b>Uploaded Identification Document:</b></p>
            <img src="<?php echo $_FILES['id_proof']['tmp_name']; ?>" width="180" alt="ID Document Preview">
        <?php
        }
        ?>
        <br><br>
        <a href=""
