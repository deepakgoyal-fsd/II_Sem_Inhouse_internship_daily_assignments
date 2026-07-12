<?php

include ("db.php");

if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $college = $_POST['college'];
    $branch = $_POST['branch'];
    $cgpa = $_POST['cgpa'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    // Grade Logic
    if($cgpa >= 9)
        $grade = "A+";
    elseif($cgpa >= 8)
        $grade = "A";
    elseif($cgpa >= 7)
        $grade = "B";
    elseif($cgpa >= 6)
        $grade = "C";
    else
        $grade = "Fail";

    $sql = "INSERT INTO admin
    (name,email,college,branch,cgpa,grade,phone,address)
    VALUES
    ('$name','$email','$college','$branch','$cgpa','$grade','$phone','$address')";

    if(mysqli_query($conn,$sql))
    {
        echo "<h2>Registration Successful!</h2>";
        echo "<a href='student.php'>View Students</a>";
    }
    else
    {
        echo "Error: " . mysqli_error($conn);
    }
}

?>