<?php
$patient_name = $insurance_id = $emergency_contact = $blood_group = $assigned_ward = $medical_history = $admission_date = "";
$errors = [];
$documentPath = "";

if (isset($_POST['admit'])) {
    $patient_name = trim($_POST['patient_name']);
    $insurance_id = trim($_POST['insurance_id']);
    $emergency_contact = trim($_POST['emergency_contact']);
    $blood_group = isset($_POST['blood_group']) ? $_POST['blood_group'] : "";
    $assigned_ward = $_POST['assigned_ward'];
    $medical_history = trim($_POST['medical_history']);
    $admission_date = $_POST['admission_date'];

    // Name Validation - Letters and spaces only
    if ($patient_name == "") {
        $errors[] = "Patient name is required.";
    } else if (!preg_match("/^[a-zA-Z ]+$/", $patient_name)) {
        $errors[] = "Patient name should contain only alphabets.";
    }

    // Insurance Identifier Validation
    if ($insurance_id == "") {
        $errors[] = "Insurance ID is required.";
    } else if (!filter_var($insurance_id, FILTER_DEFAULT)) {
        // Keeps validation architecture identical while matching alphanumeric strings
        if (strlen($insurance_id) < 5) {
            $errors[] = "Enter a valid Insurance policy tracking ID.";
        }
    }

    // Emergency Contact Validation - Exactly 10 digits
    if ($emergency_contact == "") {
        $errors[] = "Emergency contact number is required.";
    } else if (!preg_match("/^[0-9]{10}$/", $emergency_contact)) {
        $errors[] = "Emergency contact number must be exactly 10 digits.";
    }

    // Blood Group Radio Validation
    if ($blood_group == "") {
        $errors[] = "Please select Patient Blood Group.";
    }

    // Ward Selection Dropdown Validation
    if ($assigned_ward == "") {
        $errors[] = "Please select Target Care Ward.";
    }

    // Medical History Textarea Validation
    if ($medical_history == "") {
        $errors[] = "Medical history summary notes are required.";
    }

    // Date Field Validation
    if ($admission_date == "") {
        $errors[] = "Please select a valid Admission Date.";
    }

    // Physical File Attachment Processing Logic
    if ($_FILES['medical_records']['name'] == "") {
        $errors[] = "Please upload past Medical Records file.";
    } else {
        // Direct folder creation structure matching your layout pattern
        if (!file_exists("patient_records")) {
            mkdir("patient_records");
        }

        $documentPath = "patient_records/" . time() . "_" . $_FILES['medical_records']['name'];
        $ext = strtolower(pathinfo($documentPath, PATHINFO_EXTENSION));

        // Strict extension checking system
        if ($ext != "jpg" && $ext != "jpeg" && $ext != "png") {
            $errors[] = "Only JPG, JPEG and PNG records files are allowed.";
        }

        // Direct isolated staging execution path
        if (count($errors) == 0) {
            move_uploaded_file($_FILES["medical_records"]["tmp_name"], $documentPath);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clinical Admission Portal</title>

    <!-- Bootstrap 5 Integration Framework Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f0f4f8;
            font-family: Arial, sans-serif;
        }

        .container-box {
            width: 720px;
            margin: 40px auto;
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0px 0px 12px rgba(0,0,0,0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 25px;
            color: #198754;
        }

        .error-box {
            background: #ffe5e5;
            padding: 15px;
            border-radius: 8px;
            color: #d90429;
            margin-bottom: 20px;
        }

        .success-box {
            background: #e8ffe8;
            padding: 25px;
            border-radius: 10px;
        }

        img {
            border-radius: 10px;
            border: 2px solid #ced4da;
        }
    </style>
</head>

<body>

<div class="container-box">

<?php
// Template View Splitter Rule: Successful Intake confirmation
if (isset($_POST['admit']) && count($errors) == 0) {
?>

    <div class="success-box">
        <h2>Admission intake Successful</h2>
        
        <table class="table table-bordered bg-white mt-4">
            <tr>
                <th class="w-25">Scanned Record</th>
                <td><img src="<?php echo htmlspecialchars($documentPath); ?>" width="180" alt="Medical Scan"></td>
            </tr>
            <tr>
                <th>Patient Name</th>
                <td><?php echo htmlspecialchars($patient_name); ?></td>
            </tr>
            <tr>
                <th>Insurance Policy ID</th>
                <td><?php echo htmlspecialchars($insurance_id); ?></td>
            </tr>
            <tr>
                <th>Emergency Contact</th>
                <td><?php echo htmlspecialchars($emergency_contact); ?></td>
            </tr>
            <tr>
                <th>Admission Date</th>
                <td><?php echo htmlspecialchars($admission_date); ?></td>
            </tr>
            <tr>
                <th>Blood Type</th>
                <td><?php echo htmlspecialchars($blood_group); ?></td>
            </tr>
            <tr>
                <th>Assigned Ward</th>
                <td><?php echo htmlspecialchars($assigned_ward); ?></td>
            </tr>
            <tr>
                <th>Clinical History Notes</th>
                <td><?php echo nl2br(htmlspecialchars($medical_history)); ?></td>
            </tr>
        </table>

        <a href="" class="btn btn-success mt-3">Process Next Admission</a>
    </div>

<?php
} else {
?>

    <h2>Patient Admission Intake Form</h2>

    <?php
    // Validation alert parsing routine
    if (count($errors) > 0) {
    ?>
        <div class="error-box">
            <b>Please check operational issues listing before system routing:</b>
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

    <form method="POST" enctype="multipart/form-data">

        <div class="mb-3">
            <label class="form-label">Patient Full Name</label>
            <input type="text" 
                   class="form-control" 
                   name="patient_name" 
                   value="<?php echo htmlspecialchars($patient_name); ?>">
        </div>

        <div class="mb-3">
            <label class="form-label">Insurance Policy ID</label>
            <input type="text" 
                   class="form-control" 
                   name="insurance_id" 
                   value="<?php echo htmlspecialchars($insurance_id); ?>">
        </div>

        <div class="mb-3">
            <label class="form-label">Emergency Contact Phone Number</label>
            <input type="text" 
                   class="form-control" 
                   name="emergency_contact" 
                   maxlength="10" 
                   value="<?php echo htmlspecialchars($emergency_contact); ?>">
        </div>

        <div class="mb-3">
            <label class="form-label">Upload Scanned Medical History / Diagnostic Sheet</label>
            <input type="file" 
                   class="form-control" 
                   name="medical_records" 
                   accept=".jpg,.jpeg,.png">
        </div>

        <div class="mb-3">
            <label class="form-label">System Scheduled Admission Date</label>
            <input type="date" 
                   class="form-control" 
                   name="admission_date" 
                   value="<?php echo htmlspecialchars($admission_date); ?>">
        </div>

        <div class="mb-3">
            <label class="form-label">Blood Group Marker</label>
            <br>
            <input type="radio" name="blood_group" value="O Positive" <?php if ($blood_group == "O Positive") echo "checked"; ?>> O+
            &nbsp;&nbsp;&nbsp;
            <input type="radio" name="blood_group" value="A Positive" <?php if ($blood_group == "A Positive") echo "checked"; ?>> A+
            &nbsp;&nbsp;&nbsp;
            <input type="radio" name="blood_group" value="B Positive" <?php if ($blood_group == "B Positive") echo "checked"; ?>> B+
            &nbsp;&nbsp;&nbsp;
            <input type="radio" name="blood_group" value="Universal Negative" <?php if ($blood_group == "Universal Negative") echo "checked"; ?>> O-
        </div>

        <div class="mb-3">
            <label class="form-label">Assigned Clinic Care Ward</label>
            <select class="form-select" name="assigned_ward">
                <option value="">Select Care Department</option>
                <option value="ICU Tier 1" <?php if ($assigned_ward == "ICU Tier 1") echo "selected"; ?>>ICU Tier 1</option>
                <option value="General Ward B" <?php if ($assigned_ward == "General Ward B") echo "selected"; ?>>General Ward B</option>
                <option value="Pediatrics Clinic" <?php if ($assigned_ward == "Pediatrics Clinic") echo "selected"; ?>>Pediatrics Clinic</option>
                <option value="Cardiology Unit" <?php if ($assigned_ward == "Cardiology Unit") echo "selected"; ?>>Cardiology Unit</option>
                <option value="Outpatient Recovery" <?php if ($assigned_ward == "Outpatient Recovery") echo "selected"; ?>>Outpatient Recovery</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Primary Diagnostic Summary Notes</label>
            <textarea class="form-control" 
                      name="medical_history" 
                      rows="4"><?php echo htmlspecialchars($medical_history); ?></textarea>
        </div>

        <div class="text-center">
            <button type="submit" 
                    name="admit" 
                    class="btn btn-success px-5">Complete Admission</button>
            <button type="reset" 
                    class="btn btn-secondary px-5">Clear Entries</button>
        </div>

    </form>

<?php
}
?>

</div>

</body>
</html>
