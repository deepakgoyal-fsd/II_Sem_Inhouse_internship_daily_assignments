<?php
echo "Hello Students";

// Variables → Case-sensitive
// $name = "Ram";
// echo $Name; // error

//Functions → Case-insensitive
// function Hello() {
//     echo "Hi";
// }
// hello(); // Hi
// HELLO(); // Hi
// HeLLo(); // Hi


// define("PI", 3.14);

$name = "Rahul";
$city = "Jaipur";
echo "Name: ", $name, " | City: ", $city;

$name = "Rahul";
$city = "Jaipur";
print "Name: " . $name . " | City: " . $city;


//Indexed Array
$colors = ["Red", "Green", "Blue"];
echo $colors[0];

//Associative Array
$student = [
  "name" => "Aman",
  "age" => 20
];
echo $student["name"];


//$_GET and $_POST
// page.php?name=Rahul
// echo $_GET['name'];
// echo $_POST['email'];


//Superglobals
// $_GET
// $_POST
// $_SERVER
// $_SESSION
// $_COOKIE



//if–else
$age = 20;
if ($age >= 18) {
    echo "Allowed";
} else {
    echo "Not allowed";
}


//Form Handling
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    echo $_POST['name'];
}


//Simple Validation Concept
if (empty($_POST['name'])) {
    echo "Name is required";
}


//isset() vs empty()
isset($name); // true
empty($name); // true



//die() / exit()
// echo "Start";
// die("Stopped here");
// echo "End";




//$data = ["PHP", "HTML", "CSS"];
// print_r($data);
// var_dump($data);



//Error Messages & Why They Occur
echo $name;
?>