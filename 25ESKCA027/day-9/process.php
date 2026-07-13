<?php

include("db_connect.php");

$message="";
$class="";

if(isset($_POST['submit']))
{
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $branch = trim($_POST['branch']);
    $college = trim($_POST['college']);

    if(empty($name) || empty($email) || empty($branch) || empty($college))
    {
        $message="Please fill in all the fields";
        $class="error";
    }
    elseif(!filter_var($email,FILTER_VALIDATE_EMAIL))
    {
        $message="Please enter a valid email address";
        $class="error";
    }
    else
    {
        $check = "SELECT * FROM students WHERE email='$email'";
        $result = mysqli_query($conn,$check);

        if(mysqli_num_rows($result)>0)
        {
            $message="This email is already registered";
            $class="error";
        }
        else
        {
            $sql = "INSERT INTO students (name,email,branch,college) VALUES ('$name','$email','$branch','$college')";

            if(mysqli_query($conn,$sql))
            {
                $message="Enrollment Completed Successfully!";
                $class="success";
            }
            else
            {
                $message="Database Error : ".mysqli_error($conn);
                $class="error";
            }
        }
    }
}

?>

<!DOCTYPE html>
<html>
<head>

<title>Enrollment Status</title>

<style>

body{
    height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    background:#eef3fb;
    font-family:"Poppins",sans-serif;
}

.box{
    background:white;
    padding:35px;
    width:420px;
    text-align:center;
    border-radius:15px;
    box-shadow:0 12px 28px rgba(0,0,0,.18);
}

.success{
    background:#dcfce7;
    color:#15803d;
    padding:15px;
    border-radius:8px;
    font-weight:600;
}

.error{
    background:#fee2e2;
    color:#dc2626;
    padding:15px;
    border-radius:8px;
    font-weight:600;
}

a{
    display:inline-block;
    margin-top:22px;
    background:#2563eb;
    color:white;
    padding:10px 22px;
    text-decoration:none;
    border-radius:8px;
}

a:hover{
    background:#1e40af;
}

</style>

</head>

<body>

<div class="box">

<div class="<?php echo $class; ?>">

<?php echo $message; ?>

</div>

<a href="index.php">

Back to Form

</a>

</div>

</body>
</html>