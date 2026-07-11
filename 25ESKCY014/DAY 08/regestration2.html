<?php 

include('db_connect.php');

$folder = "uploads/";

if (!is_dir($folder)) {
    mkdir($folder, 0777, true);
}

if (isset($_FILES["myfile"])) {

    $allowedTypes = ["jpg", "jpeg", "png", "webp"];

    $extension = strtolower(pathinfo($_FILES["myfile"]["name"], PATHINFO_EXTENSION));

    $maxsize = 20 * 1024 * 1024;

    if (!in_array($extension, $allowedTypes)) {
        die("Only JPG, JPEG, PNG and WEBP files are allowed.");
    }

    if ($_FILES["myfile"]["size"] > $maxsize) {
        die("Maximum allowed file size is 20 MB.");
    }

    if ($_FILES["myfile"]["error"] != 0) {
        die("Error while uploading the file.");
    }

    $filename = time(). "_". rand(1,100) . "." . $extension;

    $destination = $folder . $filename;

    if (move_uploaded_file($_FILES["myfile"]["tmp_name"], $destination)) {
        echo "File uploaded successfully!<br>";
        echo "Saved as: " . $filename; echo "<br>";
    
    } else {
        echo "Failed to upload file.<br>";
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
$name = mysqli_real_escape_string($conn, $_POST['name']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$branch = mysqli_real_escape_string($conn, $_POST['branch']);
$cgpa = $_POST['cgpa'];
$phone_no = $_POST['phone_no'];

$sql = "INSERT INTO user (photo, name, email, branch, cgpa, phone_no)
VALUES ('$filename','$name','$email', '$branch', '$cgpa','$phone_no')";

if (mysqli_query($conn, $sql)) {
echo "Student Registered Successfully! <br>";
} else {
echo "Error: " . mysqli_error($conn);
}
}

?>