<?php

$name = "Swasti Sharma";

$date = date("Y-M-D");

$time = date("H:i:s");

$language = "PHP";

$ip = $_SERVER['REMOTE_ADDR'];

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Welcome Page</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

<style>

body{

background:linear-gradient(135deg,#4E342E,#6D4C41,#D7CCC8);

font-family:'Segoe UI',sans-serif;

min-height:100vh;

display:flex;

justify-content:center;

align-items:center;

}

.card{

background:#FFF8F3;

border:none;

border-radius:25px;

box-shadow:0 20px 40px rgba(0,0,0,.35);

max-width:700px;

width:100%;

overflow:hidden;

}

.card-header{

background:#5D4037;

color:white;

text-align:center;

padding:25px;

}

.card-header h1{

margin:0;

font-weight:bold;

}

.card-body{

padding:40px;

}

.info{

background:#EFEBE9;

padding:18px;

margin-bottom:18px;

border-left:6px solid #6F4E37;

border-radius:12px;

font-size:18px;

transition:.3s;

}

.info:hover{

transform:translateX(8px);

background:#D7CCC8;

}

.info i{

color:#6F4E37;

margin-right:12px;

font-size:20px;

}

.footer{

background:#5D4037;

color:white;

text-align:center;

padding:15px;

font-size:15px;

}

</style>

</head>

<body>

<div class="card">

<div class="card-header">

<h1>

☕ Welcome to My PHP Coffee Page

</h1>

</div>

<div class="card-body">

<div class="info">

<i class="fa-solid fa-user"></i>

<strong>Name :</strong>

<?php echo $name; ?>

</div>

<div class="info">

<i class="fa-solid fa-calendar-days"></i>

<strong>Current Date :</strong>

<?php echo $date; ?>

</div>

<div class="info">

<i class="fa-solid fa-clock"></i>

<strong>Current Time :</strong>

<?php echo $time; ?>

</div>

<div class="info">

<i class="fa-solid fa-code"></i>

<strong>Favourite Programming Language :</strong>

<?php echo $language; ?>

</div>

<div class="info">

<i class="fa-solid fa-globe"></i>

<strong>Visitor IP Address :</strong>

<?php echo $ip; ?>

</div>

</div>

<div class="footer">

Designed with 🤎 by Swasti

</div>

</div>

</body>

</html>