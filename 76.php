```php
<?php
include('76.php');

$success = false;
$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name     = trim($_POST['fullName']);
    $email    = trim($_POST['email']);
    $phone    = trim($_POST['phone']);
    $branch   = trim($_POST['branch']);
    $gender   = $_POST['gender'] ?? "";
    $dob      = trim($_POST['dob']);
    $city     = trim($_POST['city']);
    $address  = trim($_POST['address']);
    $password = trim($_POST['password']);

    $hobbies = "";
    if(isset($_POST['hobbies'])){
        $hobbies = implode(", ", $_POST['hobbies']);
    }

    /* Validation */

    if (!preg_match("/^[a-zA-Z ]+$/", $name)) {
        $errors[] = "Name should contain only letters and spaces.";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Enter a valid email address.";
    }

    if (!preg_match("/^[0-9]{10}$/", $phone)) {
        $errors[] = "Phone number must contain exactly 10 digits.";
    }

    if (empty($branch)) {
        $errors[] = "Please select a branch.";
    }

    if (empty($gender)) {
        $errors[] = "Please select a gender.";
    }

    if (strlen($address) < 5) {
        $errors[] = "Address must be at least 5 characters long.";
    }

    if (strlen($password) < 6) {
        $errors[] = "Password must be at least 6 characters long.";
    }

    if (empty($errors)) {

        $name     = mysqli_real_escape_string($conn, $name);
        $email    = mysqli_real_escape_string($conn, $email);
        $phone    = mysqli_real_escape_string($conn, $phone);
        $branch   = mysqli_real_escape_string($conn, $branch);
        $gender   = mysqli_real_escape_string($conn, $gender);
        $dob      = mysqli_real_escape_string($conn, $dob);
        $city     = mysqli_real_escape_string($conn, $city);
        $address  = mysqli_real_escape_string($conn, $address);
        $password = mysqli_real_escape_string($conn, $password);
        $hobbies  = mysqli_real_escape_string($conn, $hobbies);

        $sql = "INSERT INTO students
                (name,email,phone,branch,gender,dob,city,address,password,hobbies)
                VALUES
                ('$name','$email','$phone','$branch','$gender',
                 '$dob','$city','$address','$password','$hobbies')";

        if(mysqli_query($conn,$sql)){
            $success = true;
        }
        else{
            $errors[] = mysqli_error($conn);
        }
    }
}
?>
```
