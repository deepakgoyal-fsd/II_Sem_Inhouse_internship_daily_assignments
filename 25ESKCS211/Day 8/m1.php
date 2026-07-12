<!DOCTYPE html>
<html>
<head>
    <title>Student Registration Confirmation System</title>

    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:Arial,sans-serif;
        }

        body{
            background: #e8f0fe;
        }

        h1{
            background: #0d6efd;
            color:white;
            text-align:center;
            padding:20px;
            letter-spacing:1px;
        }

        form{
            width:500px;
            margin:30px auto;
            background:  white;
            padding:25px;
            border-radius:12px;
            box-shadow:0 5px 15px rgba(0,0,0,.2);
        }

        table{
            width:100%;
            border-collapse:collapse;
        }

        td{
            padding:10px;
        }

        input,
        select{
            width:100%;
            padding:10px;
            border:1px solid #bbb;
            border-radius:6px;
            font-size:15px;
        }

        input:focus,
        select:focus{
            border-color:#0d6efd;
            outline:none;
            box-shadow:0 0 5px rgba(13,110,253,.4);
        }

        input[type=submit]{
            background:#0d6efd;
            color:white;
            border:none;
            cursor:pointer;
            transition:.3s;
            font-size:16px;
            font-weight:bold;
        }

        input[type=submit]:hover{
            background:#084298;
        }

        input[type=reset]{
            background:#6c757d;
            color:white;
            border:none;
            cursor:pointer;
            transition:.3s;
            font-size:16px;
            font-weight:bold;
        }

        input[type=reset]:hover{
            background:#495057;
        }

        .card{
            width:550px;
            margin:30px auto;
            background:white;
            padding:25px;
            border-radius:12px;
            border-left:8px solid #0d6efd;
            box-shadow:0 8px 20px rgba(0,0,0,.2);
            animation:fadeIn .6s ease;
        }

        @keyframes fadeIn{
            from{
                opacity:0;
                transform:translateY(25px);
            }
            to{
                opacity:1;
                transform:translateY(0);
            }
        }

        .card h2{
            text-align:center;
            color:#0d6efd;
            margin-bottom:10px;
        }

        .success{
            text-align:center;
            color:green;
            font-size:18px;
            font-weight:bold;
            margin-bottom:15px;
        }

        .error{
            width:500px;
            margin:auto;
            background:#ffd6d6;
            color:red;
            padding:12px;
            border-radius:6px;
            text-align:center;
            font-weight:bold;
        }

        .card table td{
            border:1px solid #ddd;
            padding:12px;
        }

        footer{
            margin-top:30px;
            background:#0d6efd;
            color:white;
            text-align:center;
            padding:15px;
        }

    </style>
</head>

<body>

<h1>Student Registration Confirmation System</h1>

<?php

$name="";
$email="";
$branch="";
$college="";
$cgpa="";
$grade="";
$message="";
$regNo="";

if(isset($_POST["submit"]))
{

    $name=ucwords(trim(htmlspecialchars($_POST["name"])));
    $email=trim(htmlspecialchars($_POST["email"]));
    $branch=trim(htmlspecialchars($_POST["branch"]));
    $college=trim(htmlspecialchars($_POST["college"]));
    $cgpa=trim($_POST["cgpa"]);
        if($name=="" || $email=="" || $branch=="" || $college=="" || $cgpa=="")
    {
        $message="Please fill all fields.";
    }
    elseif(!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        $message="Please enter a valid Email Address.";
    }
    elseif($cgpa<0 || $cgpa>10)
    {
        $message="CGPA must be between 0 and 10.";
    }
    else
    {
        if($cgpa>=9)
            $grade="A+";
        elseif($cgpa>=8)
            $grade="A";
        elseif($cgpa>=7)
            $grade="B";
        elseif($cgpa>=6)
            $grade="C";
        elseif($cgpa>=5)
            $grade="D";
        else
            $grade="Fail";

        $regNo="REG".date("Y").rand(1000,9999);
    }

}

?>

<form method="POST">

<table>

<tr>
<td>Name</td>
<td>
<input type="text"
name="name"
required
value="<?php echo htmlspecialchars($name); ?>">
</td>
</tr>

<tr>
<td>Email</td>
<td>
<input type="email"
name="email"
required
value="<?php echo htmlspecialchars($email); ?>">
</td>
</tr>

<tr>
<td>Branch</td>
<td>

<select name="branch" required>

<option value="">Select Branch</option>

<option value="CSE" <?php if($branch=="CSE") echo "selected"; ?>>CSE</option>

<option value="IT" <?php if($branch=="IT") echo "selected"; ?>>IT</option>

<option value="ECE" <?php if($branch=="ECE") echo "selected"; ?>>ECE</option>

<option value="ME" <?php if($branch=="ME") echo "selected"; ?>>ME</option>

<option value="CE" <?php if($branch=="CE") echo "selected"; ?>>CE</option>

</select>

</td>
</tr>

<tr>
<td>College</td>
<td>
<input type="text"
name="college"
required
value="<?php echo htmlspecialchars($college); ?>">
</td>
</tr>

<tr>
<td>CGPA</td>
<td>
<input
type="number"
step="0.1"
min="0"
max="10"
required
name="cgpa"
value="<?php echo htmlspecialchars($cgpa); ?>">
</td>
</tr>

<tr>
<td colspan="2" align="center">

<input type="submit" name="submit" value="Register">

<br><br>

 <input type="button" value="Reset" onclick="window.location.href=window.location.pathname;">

</td>
</tr>

</table>

</form>

<?php

if($message!="")
{
    echo "<p class='error'>$message</p>";
}

if($grade!="")
{

echo "<div class='card'>";

echo "<h2>🎉 Registration Successful</h2>";

echo "<p class='success'>Welcome ".htmlspecialchars($name)."!</p>";

echo "<table>";

echo "<tr><td><b>Registration No.</b></td><td>$regNo</td></tr>";

echo "<tr><td><b>Name</b></td><td>".htmlspecialchars($name)."</td></tr>";

echo "<tr><td><b>Email</b></td><td>".htmlspecialchars($email)."</td></tr>";

echo "<tr><td><b>Branch</b></td><td>".htmlspecialchars($branch)."</td></tr>";

echo "<tr><td><b>College</b></td><td>".htmlspecialchars($college)."</td></tr>";

echo "<tr><td><b>CGPA</b></td><td>$cgpa</td></tr>";

echo "<tr><td><b>Grade</b></td><td>$grade</td></tr>";

echo "<tr><td><b>Date & Time</b></td><td>".date("d-m-Y h:i:s A")."</td></tr>";
echo "</table>";

echo "</div>";

}

?>

<footer>

    Student Registration Confirmation System &copy; <?php echo date("Y"); ?>

</footer>

</body>
</html>