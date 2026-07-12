 <?php
// Database connection details
$servername = "localhost";
$username   = "root";      // default for XAMPP/WAMP
$password   = "";          // default is empty
$dbname     = "industrial_training"; // your database name

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "connection successfully";
?>
