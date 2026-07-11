<?php

echo "<h2>Process Page Opened</h2><br>";

if(isset($_POST['register']))
{
    echo "POST Data Received Successfully.<br><br>";

    $name = $_POST['name'];
    $email = $_POST['email'];

    echo "Name: " . $name . "<br>";
    echo "Email: " . $email . "<br>";
}
else
{
    echo "Invalid Request!";
}

?>4