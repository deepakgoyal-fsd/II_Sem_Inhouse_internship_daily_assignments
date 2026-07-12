<?php

function clean($data){
    return htmlspecialchars(trim($data));
}

if($_SERVER["REQUEST_METHOD"]=="POST"){

    $first_name = clean($_POST["first_name"]);
    $last_name  = clean($_POST["last_name"]);
    $email      = clean($_POST["email"]);
    $phone      = clean($_POST["phone"]);
    $dob        = clean($_POST["dob"]);
    $gender     = clean($_POST["gender"]);
    $course     = clean($_POST["course"]);
    $branch     = clean($_POST["branch"]);
    $address    = clean($_POST["address"]);

    // Empty Field Validation
    if(
        empty($first_name) ||
        empty($last_name) ||
        empty($email) ||
        empty($phone) ||
        empty($dob) ||
        empty($gender) ||
        empty($course) ||
        empty($branch) ||
        empty($address)
    ){
        die("<h2 style='color:red;text-align:center;'>All fields are required.</h2>");
    }

    // Email Validation
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        die("<h2 style='color:red;text-align:center;'>Invalid Email Address.</h2>");
    }

    // Phone Validation
    if(!preg_match("/^[0-9]{10}$/",$phone)){
        die("<h2 style='color:red;text-align:center;'>Phone number must be exactly 10 digits.</h2>");
    }

    // Success Page
    echo "
    <!DOCTYPE html>
    <html>
    <head>
    <title>Registration Successful</title>
    <style>
    body{
        font-family:Arial;
        background:#f4f4f4;
        display:flex;
        justify-content:center;
        align-items:center;
        height:100vh;
    }
    .box{
        background:white;
        padding:30px;
        border-radius:12px;
        box-shadow:0 10px 25px rgba(0,0,0,.2);
        width:420px;
    }
    h2{
        color:green;
        text-align:center;
    }
    p{
        font-size:17px;
        margin:8px 0;
    }
    </style>
    </head>
    <body>

    <div class='box'>

    <h2>Registration Successful</h2>

    <p><b>First Name:</b> $first_name</p>

    <p><b>Last Name:</b> $last_name</p>

    <p><b>Email:</b> $email</p>

    <p><b>Phone:</b> $phone</p>

    <p><b>Date of Birth:</b> $dob</p>

    <p><b>Gender:</b> $gender</p>

    <p><b>Course:</b> $course</p>

    <p><b>Branch:</b> $branch</p>

    <p><b>Address:</b> $address</p>

    </div>

    </body>
    </html>
    ";

}else{

    echo "Invalid Request.";

}

?>