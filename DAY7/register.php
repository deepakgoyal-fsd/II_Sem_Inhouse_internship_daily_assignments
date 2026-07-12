<?php

$errors = [];

$name = trim($_POST['name']);
$email = trim($_POST['email']);
$phone = trim($_POST['phone']);
$gender = $_POST['gender'] ?? "";
$course = $_POST['course'];
$address = trim($_POST['address']);

// Validation

if(empty($name)){
    $errors[] = "Name is required.";
}
elseif(!preg_match("/^[a-zA-Z ]+$/",$name)){
    $errors[] = "Name should contain only letters.";
}

if(empty($email)){
    $errors[] = "Email is required.";
}
elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
    $errors[] = "Invalid Email.";
}

if(empty($phone)){
    $errors[] = "Phone Number is required.";
}
elseif(!preg_match("/^[0-9]{10}$/",$phone)){
    $errors[] = "Enter valid 10 digit phone number.";
}

if(empty($gender)){
    $errors[] = "Please select Gender.";
}

if(empty($course)){
    $errors[] = "Please select Course.";
}

if(strlen($address) < 10){
    $errors[] = "Address should be at least 10 characters.";
}

// Photo Upload

$photoName = "";

if(isset($_FILES['photo']) && $_FILES['photo']['error']==0){

    if(!is_dir("uploads")){
        mkdir("uploads");
    }

    $photoName = time()."_".$_FILES['photo']['name'];

    move_uploaded_file(
        $_FILES['photo']['tmp_name'],
        "uploads/".$photoName
    );
}

// Show Errors

if(count($errors)>0){

    echo "<link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css' rel='stylesheet'>";

    echo "<div class='container mt-5'>";

    echo "<div class='alert alert-danger'>";

    foreach($errors as $error){
        echo $error."<br>";
    }

    echo "<br><a href='index.php' class='btn btn-primary'>Go Back</a>";

    echo "</div>";

    echo "</div>";

}
else{

    header("Location: success.php?name="
    .urlencode($name).
    "&email=".urlencode($email).
    "&phone=".urlencode($phone).
    "&gender=".urlencode($gender).
    "&course=".urlencode($course).
    "&address=".urlencode($address).
    "&photo=".urlencode($photoName));

    exit();

}

?>