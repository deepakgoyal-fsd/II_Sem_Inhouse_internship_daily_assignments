<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["fullname"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $age = $_POST["age"];
    $course = $_POST["course"];
    $gender = $_POST["gender"];
    
    $fileName = basename($_FILES["profile"]["name"]);
    $tempName = $_FILES["profile"]["tmp_name"];
    $folder = "uploads/" . $fileName;
    if (move_uploaded_file($tempName, $folder)) {
        $message = "Image Uploaded Successfully";
    } else {
        $message = "Image Upload Failed";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Registration Details</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Registration Successful</h2>
        <img src="<?php echo $folder; ?>" width="150" height="150">
        <p><strong>Name :</strong> <?php echo $name; ?></p>
        <p><strong>Email :</strong> <?php echo $email; ?></p>
        <p><strong>Password :</strong> <?php echo $password; ?></p>
        <p><strong>Age :</strong> <?php echo $age; ?></p>
        <p><strong>Course :</strong> <?php echo $course; ?></p>
        <p><strong>Gender :</strong> <?php echo $gender; ?></p>
    </div>
</body>
</html>