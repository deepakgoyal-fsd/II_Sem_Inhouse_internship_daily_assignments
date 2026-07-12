<?php

$name = $_POST['name'];
$roll_no = $_POST['roll_no'];
$branch = $_POST['branch'];
$cgpa = $_POST['cgpa'];
$phone_number = $_POST['phone_number'];

// Photo Upload
$photo = $_FILES['photo']['name'];
$temp = $_FILES['photo']['tmp_name'];

$folder = "Uploads/" . $photo;

// Move uploaded image
move_uploaded_file($temp, $folder);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Registration Successful</title>

    <style>

        body{
            font-family:Arial, sans-serif;
            background:#f4f4f4;
        }

        .container{
            width:450px;
            margin:40px auto;
            background:white;
            padding:25px;
            text-align:center;
            border-radius:10px;
            box-shadow:0px 0px 10px gray;
        }

        img{
            width:180px;
            height:180px;
            border-radius:10px;
            object-fit:cover;
        }

        h2{
            color:green;
        }

    </style>

</head>

<body>

<div class="container">

<h2>Registration Successful!</h2>

<img src="<?php echo $folder; ?>">

<br><br>

<p><b>Name :</b> <?php echo $name; ?></p>

<p><b>Roll Number :</b> <?php echo $roll_no; ?></p>

<p><b>Branch :</b> <?php echo $branch; ?></p>

<p><b>CGPA :</b> <?php echo $cgpa; ?></p>

<p><b>Phone Number :</b> <?php echo $phone_number; ?></p>

</div>

</body>
</html>