<?php
include("includes/db_connect.php");

if(isset($_POST['submit']))
{
    $student_name = $_POST['student_name'];
    $roll_no      = $_POST['roll_no'];
    $branch       = $_POST['branch'];
    $year         = $_POST['year'];
    $email        = $_POST['email'];
    $phone        = $_POST['phone'];
    $category     = $_POST['category'];
    $event_name   = $_POST['event_name'];

    $sql = "INSERT INTO registrations
    (student_name, roll_no, branch, year, email, phone, category, event_name)
    VALUES
    ('$student_name','$roll_no','$branch','$year','$email','$phone','$category','$event_name')";

    if(mysqli_query($conn,$sql))
    {
        echo "<script>
        alert('Registration Successful!');
        window.location='gallery.php';
        </script>";
    }
    else
    {
        echo "<script>alert('Registration Failed!');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>

<title>Student Event Registration</title>

<link rel="stylesheet" href="css/style.css">

<style>

body{
    margin:0;
    font-family:Arial,sans-serif;
    background:url("images/skit.jpg") no-repeat center center;
    background-size:cover;
}

.overlay{
    width:100%;
    min-height:100vh;
    background:rgba(0,0,0,0.6);
    display:flex;
    justify-content:center;
    align-items:center;
}

.form-box{
    width:500px;
    background:#fff;
    padding:30px;
    border-radius:15px;
    box-shadow:0 0 20px rgba(0,0,0,0.4);
}

h2{
    text-align:center;
    color:#0d47a1;
    margin-bottom:20px;
}

input,select{
    width:100%;
    padding:12px;
    margin-bottom:15px;
    border:1px solid #ccc;
    border-radius:5px;
    font-size:15px;
}

button{
    width:100%;
    padding:14px;
    background:#ff9800;
    color:white;
    border:none;
    border-radius:5px;
    font-size:18px;
    cursor:pointer;
}

button:hover{
    background:#e68900;
}

</style>

</head>

<body>

<div class="overlay">

<div class="form-box">

<h2>Student Event Registration</h2>

<form method="POST">

<input type="text" name="student_name" placeholder="Student Name" required>

<input type="text" name="roll_no" placeholder="Roll Number" required>

<input type="text" name="branch" placeholder="Branch" required>

<select name="year" required>
<option value="">Select Year</option>
<option>1st Year</option>
<option>2nd Year</option>
<option>3rd Year</option>
<option>4th Year</option>
</select>

<input type="email" name="email" placeholder="Email Address" required>

<input type="text" name="phone" placeholder="Phone Number" required>

<select name="category" required>
<option value="">Select Category</option>
<option>Technical</option>
<option>Cultural</option>
<option>Sports</option>
<option>Workshop</option>
<option>Seminar</option>
</select>

<select name="event_name" required>
<option value="">Select Event</option>
<option>Technical Fest</option>
<option>Cultural Fest</option>
<option>Sports Meet</option>
<option>Workshop</option>
<option>Seminar</option>
<option>Innovation Expo</option>
</select>

<button type="submit" name="submit">
Register Now
</button>

</form>

</div>

</div>

</body>
</html>