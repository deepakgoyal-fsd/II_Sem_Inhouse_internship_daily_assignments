<?php

$conn = mysqli_connect(
    "localhost",
    "root",
    "",
    "student_db"
);


if(!$conn){

    die("Database Connection Failed");

}

?>