<!DOCTYPE html>
<html>
<head>
    <title>Welcome</title>

    <style>

        body{
            background:#f2f2f2;
            font-family:Arial;
        }

        .box{
            width:450px;
            margin:80px auto;
            background:white;
            padding:20px;
            border-radius:10px;
            box-shadow:0 0 10px gray;
        }

        h2{
            color:blue;
        }

    </style>

</head>

<body>

<?php

$name="Nikhil goyal";

$language="PHP";

$date=date("12-07-26");


$ip=$_SERVER['REMOTE_ADDR'];

?>

<div class="box">

<h2>Welcome Page</h2>

<p><b>Name :</b> <?php echo $name; ?></p>

<p><b>Date :</b> <?php echo $date; ?></p>



<p><b>Favourite Language :</b> <?php echo $language; ?></p>

<p><b>IP Address :</b> <?php echo $ip; ?></p>

</div>

</body>

</html>