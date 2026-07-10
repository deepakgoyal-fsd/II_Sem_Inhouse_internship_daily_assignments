<?php
include('db_connect.php');

$name = $_POST["name"];
$gender = $_POST["gender"];
$email = $_POST["email"];
$txtPhone = $_POST["txtPhone"];
$pwdPassword = $_POST["pwdPassword"];
$branch = $_POST["branch"];
$dob = $_POST["dtDOB"];



echo "Values Received:<br>";
echo "Name: $name <br>";
echo "Gender: $gender <br>";
echo "Email: $email <br>";
echo "Phone: $txtPhone <br>";

$errors = [];

if(empty($name)){
    $errors[] = "Name is empty";
}
if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    $errors[] = "Email is invalid";
}
if(empty($pwdPassword)){
    $errors[] = "Password cannot be empty";
}
if($pwdPassword !== $_POST["pwdConfirmPassword"]){
    $errors[] = "Passwords do not match";
}
elseif(strlen($pwdPassword) < 8){
    $errors[] = "Password must be at least 8 characters";
}
if(empty($txtPhone)){
    $errors[] = "Phone Number is required";
}
elseif(!is_numeric($txtPhone)){
    $errors[] = "Phone Number is invalid";
}
elseif(strlen($txtPhone) != 10){
    $errors[] = "Phone Number must be 10 digits";
}

if(count($errors) > 0){
    foreach($errors as $error){
        echo $error . "<br>";
    }
}
else{
    $hashedPassword = password_hash($pwdPassword, PASSWORD_DEFAULT);

    $sql = "INSERT INTO user (name, email, gender, password, phone_number, branch, dob, roll_no, cgpa)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($conn, $sql);

    if(!$stmt){
        die("Prepare failed: " . mysqli_error($conn));
    }

    $roll_no = "";   
    $cgpa = 0;       

    mysqli_stmt_bind_param(
        $stmt,
        "ssssssssd",
        $name, $email, $gender, $hashedPassword, $txtPhone, $branch, $dob, $roll_no, $cgpa
    );

    if(mysqli_stmt_execute($stmt)){
        echo "<br>Form Submitted Successfully";
    } else {
        echo "<br>Error: " . mysqli_stmt_error($stmt);
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
?>