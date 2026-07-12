<!DOCTYPE html>
<html>
<body>

<form method="post">

Enter Name :

<input type="text" name="name">

<button type="submit">Submit</button>

</form>

<?php

echo "Page Loaded At : " . date("H:i:s");

echo "<br>";

$name = $_POST['name'] ?? "Guest";

echo "Welcome " . $name;

?>

</body>
</html>