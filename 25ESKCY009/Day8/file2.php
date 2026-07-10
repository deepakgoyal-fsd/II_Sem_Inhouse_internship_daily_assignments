<!DOCTYPE html>
<html>

<head>
    <title>PHP Example 2</title>
</head>

<body>

<?php

$name = "Anirudh Sharma";

$currentDate = "2026-07-14";

$favouriteProgrammingLanguage = "HTML, CSS";

?>

<h1><?php echo $name; ?></h1>

<p>Date : <?php echo $currentDate; ?></p>

<p>Favourite Programming Language :
<?php echo $favouriteProgrammingLanguage; ?>
</p>

<p>Current Date & Time :
<?php echo date("Y-m-d H:i:s"); ?>
</p>

<p>Your IP Address :
<?php echo $_SERVER["REMOTE_ADDR"]; ?>
</p>

</body>

</html>