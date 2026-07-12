<?php

include('db_connect.php');

if($_SERVER["REQUEST_METHOD"]=="POST")
{
$Name = $_POST["Name"];
$Email = $_POST["Email"];
$BirthDate = $_POST["BirthDate"];
$PhoneNumber = $_POST["PhoneNumber"];
$Gender = $_POST["Gender"];
$Address1 = $_POST["Address1"];
$Address2 = $_POST["Address2"];
$Country = $_POST["Country"];
$City = $_POST["City"];
$Region = $_POST["Region"];
$PostalCode = $_POST["Code"];
$Branch = $_POST["Branch"];
}

$folder = "Uploads/";

if (!is_dir($folder)) {
    mkdir($folder, 0777, true);
}

if (isset($_FILES["Photo"])) {

    $allowedTypes = ["jpg", "jpeg", "png", "gif", "webp"];

    $extension = strtolower(pathinfo($_FILES["Photo"]["name"], PATHINFO_EXTENSION));

    $maxSize = 20 * 1024 * 1024;

    if (!in_array($extension, $allowedTypes)) {
        die("Only JPG, JPEG, PNG, GIF and WEBP images are allowed.");
    }

    if ($_FILES["Photo"]["size"] > $maxSize) {
        die("Image size must not exceed 20 MB.");
    }

    $newName = time() . "_" . rand(1000, 9999) . "." . $extension;

    $targetFile = $folder . $newName;

    if (move_uploaded_file($_FILES["Photo"]["tmp_name"], $targetFile)) {

    echo "<br>";
    echo "<img src='$targetFile' width='200'><br>";

    } else {
        echo "Upload Failed.";
    }
}



if(empty($Name)){

    echo " Name is empty <br>";
}

 if(!filter_var($Email, FILTER_VALIDATE_EMAIL)){
    echo "Email is invalid";

 }

 if (!preg_match("/^[0-9]{10}$/", $_POST["PhoneNumber"])) {
    die("Phone number must be exactly 10 digits.");
}

if (!preg_match("/^[0-9]{6}$/", $_POST["Code"])) {
    die("Postal code must be 6 digits.");
}

echo "Values Received: <br>";
    echo "Name: $Name <br>";
    echo "Email: $Email <br>";
    echo "Birth Date: $BirthDate <br>";
    echo "Phone Number: $PhoneNumber <br>";
    echo "Gender: $Gender <br>";
    echo "Address 1: $Address1 <br>";
    echo "Address 2: $Address2 <br>";
    echo "Country: $Country <br>";
    echo "City: $City <br>";
    echo "Region: $Region <br>";
    echo "Postal Code: $PostalCode<br>";
    echo "Branch: $Branch <br>";


    

if( $_SERVER['REQUEST_METHOD'] == 'POST'){
    $Name = mysqli_real_escape_string($conn, $_POST['Name']);
    $Email = mysqli_real_escape_string($conn, $_POST['Email']);
    $BirthDate =  mysqli_real_escape_string($conn, $_POST["BirthDate"]);
    $PhoneNumber =  mysqli_real_escape_string($conn, $_POST["PhoneNumber"]);
    $Gender =  mysqli_real_escape_string($conn, $_POST["Gender"]);
    $Address1 =  mysqli_real_escape_string($conn, $_POST["Address1"]);
    $Address2 =  mysqli_real_escape_string($conn, $_POST["Address2"]);
    $Country =  mysqli_real_escape_string($conn, $_POST["Country"]);
    $City =  mysqli_real_escape_string($conn, $_POST["City"]);
    $Region =  mysqli_real_escape_string($conn, $_POST["Region"]);
    $PostalCode =  mysqli_real_escape_string($conn, $_POST["Code"]);
    $Branch =  mysqli_real_escape_string($conn, $_POST["Branch"]);

    $sql = "INSERT INTO user ( name ,  phone_number, branch )
    VALUES ('$Name', '$PhoneNumber', '$Branch')";

    if (mysqli_query($conn, $sql)){
        echo "Student Registered Successfully!";
    } else{
        echo "Error: ". mysqli_error($conn);
    }
}

?>
</div>
</body>
</html>