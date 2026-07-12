<?php

$conn = mysqli_connect("localhost", "root", "", "students_management");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
} else {
    echo "Connected successfully";
}

$query = "SELECT * FROM students";
$result = mysqli_query($conn, $query);
$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
foreach ($rows as $row) {
    echo "ID: " . $row['id'] . ", Name: " . $row['name'] .  "<br>";
}

//print_r($rows);
$conn->close();
