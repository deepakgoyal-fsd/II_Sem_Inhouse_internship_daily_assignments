<?php
echo "<pre>";
print_r($_POST);
echo "</pre>";

$folder="uploads/";
if(!is_dir($folder)){
    mkdir($folder,0777,true);
}
if(isset($_FILES['Photo'])){
    $allowedTypes =["jpg","jpeg","png","gif"];
    $extension = strtolower(pathinfo($_FILES['Photo']['name'], PATHINFO_EXTENSION));

    $maxSize = 20 * 1024 * 1024; // 20 MB

    if(!in_array($extension, $allowedTypes)){
        die("Invalid file type. Only JPG, JPEG, PNG, and GIF files are allowed.");
        exit;
    }

    if($_FILES['Photo']['size'] > $maxSize){
        die("File size exceeds the maximum limit of 20 MB.");
        exit;
    }
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST['name'] ?? "";
    $email = $_POST['email'] ?? "";
    $phonenumber = $_POST['phone_no'] ?? "";

    if (empty($name)) {
        echo "Name is empty!<br>";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format!<br>";
    }

    if (!preg_match("/^[0-9]{10}$/", $phonenumber)) {
        echo "Phone number must contain exactly 10 digits!<br>";
    }

    echo "<h3>Values Received</h3>";
    echo "Name: $name <br>";
    echo "Email: $email <br>";
    echo "Phone: $phone_no <br>";

} else {
    echo "Please submit the form first.";
}
?>