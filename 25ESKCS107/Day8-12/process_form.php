<?php 

include('db_connect.php');

if($_SERVER['REQUEST_METHOD'] == 'POST') {
   
   $txtName = mysqli_real_escape_string($conn, $_POST['txtName']);
   $txtEmail = mysqli_real_escape_string($conn, $_POST['txtEmail']);
   $txtPhno = mysqli_real_escape_string($conn, $_POST['txtPhno']);
   $txtGender = mysqli_real_escape_string($conn, $_POST['txtGender']);
   $txtDepartment = mysqli_real_escape_string($conn, $_POST['txtDepartment']);
   $image = mysqli_real_escape_string($conn, $uploadedImage);
   $txtDob = mysqli_real_escape_string($conn, $_POST['txtDob']);
   $txtPassword = mysqli_real_escape_string($conn, $_POST['txtPassword']);


$folder = "upload/";
$uploadedImage = "";

if (!is_dir($folder)) {
    mkdir($folder, 0777, true);
}

if (isset($_FILES["myFile"]) && $_FILES["myFile"]["error"] === UPLOAD_ERR_OK) {

    $allowedTypes = ["jpg", "jpeg", "png", "gif", "webp"];
    $extension = strtolower(pathinfo($_FILES["myFile"]["name"], PATHINFO_EXTENSION));

    $newName = time() . "_" . rand(1000,9999) . "." . $extension;
    $targetFile = $folder . $newName;

    if (move_uploaded_file($_FILES["myFile"]["tmp_name"], $targetFile)) {
        $uploadedImage = $targetFile;
    }
}


$sql = "INSERT INTO register
(name, email, phone_no, gender, department, image, dob, password)
VALUES
('$txtName', '$txtEmail', '$txtPhno', '$txtGender', '$txtDepartment', '$image', '$txtDob', '$txtPassword')";

if (mysqli_query($conn, $sql)) {
   echo "Student Registered Successfully !!";
} else {
    echo "Error :" . mysqli_error($conn);
}

}
?>