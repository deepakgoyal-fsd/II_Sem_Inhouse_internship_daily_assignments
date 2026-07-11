<?php session_start();

$count = 1;
$_SESSION['user'] = "Rishabh";
echo "<h3>Normal Variable</h3>";
echo $count;
echo "<br><br>";
echo "<h3>Session Variable</h3>";
echo $_SESSION['user'];
?>
<br><br>
<a href="page2.php">Go to Page 2</a>