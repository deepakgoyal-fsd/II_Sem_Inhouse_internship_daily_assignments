<?php
// ============================================
// PHP BASIC TUTORIAL
// ============================================

// 1. VARIABLES AND DATA TYPES
// ============================================
echo "<h2>1. Variables and Data Types</h2>";

$name = "John";              // String
$age = 25;                   // Integer
$height = 5.9;               // Float/Double
$isStudent = true;           // Boolean
$hobbies = array("Reading", "Gaming", "Coding");  // Array

echo "Name: " . $name . "<br>";
echo "Age: " . $age . "<br>";
echo "Height: " . $height . "<br>";
echo "Is Student: " . ($isStudent ? "Yes" : "No") . "<br>";
echo "Hobbies: " . implode(", ", $hobbies) . "<br><br>";


// 2. STRING OPERATIONS
// ============================================
echo "<h2>2. String Operations</h2>";

$str1 = "Hello";
$str2 = "World";

echo "Concatenation: " . $str1 . " " . $str2 . "<br>";
echo "Length of string: " . strlen($str1) . "<br>";
echo "Uppercase: " . strtoupper($str1) . "<br>";
echo "Lowercase: " . strtolower($str1) . "<br>";
echo "First letter uppercase: " . ucfirst("john") . "<br>";
echo "Substring: " . substr($str1, 0, 3) . "<br>";
echo "Replace: " . str_replace("H", "J", $str1) . "<br><br>";


// 3. ARITHMETIC OPERATIONS
// ============================================
echo "<h2>3. Arithmetic Operations</h2>";

$num1 = 20;
$num2 = 5;

echo "Addition: " . ($num1 + $num2) . "<br>";
echo "Subtraction: " . ($num1 - $num2) . "<br>";
echo "Multiplication: " . ($num1 * $num2) . "<br>";
echo "Division: " . ($num1 / $num2) . "<br>";
echo "Modulus (remainder): " . ($num1 % $num2) . "<br>";
echo "Power: " . pow($num1, 2) . "<br><br>";


// 4. IF ELSE CONDITIONS
// ============================================
echo "<h2>4. If-Else Conditions</h2>";

$marks = 75;

if ($marks >= 90) {
    echo "Grade: A<br>";
} elseif ($marks >= 80) {
    echo "Grade: B<br>";
} elseif ($marks >= 70) {
    echo "Grade: C<br>";
} else {
    echo "Grade: F<br>";
}

// Ternary operator
$status = ($marks >= 50) ? "Pass" : "Fail";
echo "Status: " . $status . "<br><br>";


// 5. SWITCH STATEMENT
// ============================================
echo "<h2>5. Switch Statement</h2>";

$day = 3;
$dayName = "";

switch ($day) {
    case 1:
        $dayName = "Monday";
        break;
    case 2:
        $dayName = "Tuesday";
        break;
    case 3:
        $dayName = "Wednesday";
        break;
    case 4:
        $dayName = "Thursday";
        break;
    case 5:
        $dayName = "Friday";
        break;
    default:
        $dayName = "Weekend";
}

echo "Day " . $day . " is: " . $dayName . "<br><br>";


// 6. LOOPS - FOR LOOP
// ============================================
echo "<h2>6. Loops - For Loop</h2>";
echo "Numbers from 1 to 5: ";

for ($i = 1; $i <= 5; $i++) {
    echo $i . " ";
}
echo "<br><br>";


// 7. LOOPS - WHILE LOOP
// ============================================
echo "<h2>7. Loops - While Loop</h2>";
echo "Countdown from 5: ";

$count = 5;
while ($count > 0) {
    echo $count . " ";
    $count--;
}
echo "<br><br>";


// 8. LOOPS - FOREACH LOOP (for arrays)
// ============================================
echo "<h2>8. Loops - Foreach Loop</h2>";

$fruits = array("Apple", "Banana", "Orange", "Mango");

echo "Fruits list:<br>";
foreach ($fruits as $fruit) {
    echo "- " . $fruit . "<br>";
}
echo "<br>";


// 9. ARRAYS
// ============================================
echo "<h2>9. Arrays</h2>";

// Indexed array
$cars = array("Toyota", "Honda", "BMW", "Audi");
echo "First car: " . $cars[0] . "<br>";
echo "Number of cars: " . count($cars) . "<br>";

// Associative array (key-value pairs)
$person = array(
    "name" => "Alice",
    "age" => 28,
    "city" => "New York",
    "email" => "alice@example.com"
);

echo "Name: " . $person["name"] . "<br>";
echo "Age: " . $person["age"] . "<br>";
echo "City: " . $person["city"] . "<br>";
echo "<br>";


// 10. FUNCTIONS
// ============================================
echo "<h2>10. Functions</h2>";

function greet($name) {
    return "Hello, " . $name . "!";
}

echo greet("PHP") . "<br>";

function add($a, $b) {
    return $a + $b;
}

echo "Sum of 10 and 20: " . add(10, 20) . "<br>";

// Function with default parameter
function welcome($name = "Guest") {
    echo "Welcome, " . $name . "!<br>";
}

welcome();
welcome("John");
echo "<br>";


// 11. WORKING WITH ARRAYS - COMMON FUNCTIONS
// ============================================
echo "<h2>11. Array Functions</h2>";

$numbers = array(3, 1, 4, 1, 5, 9, 2, 6);

echo "Original array: " . implode(", ", $numbers) . "<br>";
echo "Sorted array: " . implode(", ", sort($numbers) ? $numbers : []) . "<br>";
echo "Sum of array: " . array_sum($numbers) . "<br>";
echo "Maximum value: " . max($numbers) . "<br>";
echo "Minimum value: " . min($numbers) . "<br>";
echo "<br>";


// 12. FORM DATA HANDLING (GET and POST)
// ============================================
echo "<h2>12. Form Data Handling</h2>";
echo "<form method='POST'>";
echo "Name: <input type='text' name='username'><br>";
echo "Email: <input type='email' name='useremail'><br>";
echo "<input type='submit' value='Submit'>";
echo "</form>";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = htmlspecialchars($_POST["username"]);
    $useremail = htmlspecialchars($_POST["useremail"]);
    echo "Submitted Name: " . $username . "<br>";
    echo "Submitted Email: " . $useremail . "<br>";
}
echo "<br>";


// 13. GLOBAL VARIABLES (SUPERGLOBALS)
// ============================================
echo "<h2>13. Superglobal Variables</h2>";

echo "Current page: " . $_SERVER["PHP_SELF"] . "<br>";
echo "Server: " . $_SERVER["SERVER_NAME"] . "<br>";
echo "Request method: " . $_SERVER["REQUEST_METHOD"] . "<br>";
echo "<br>";


// 14. MATH FUNCTIONS
// ============================================
echo "<h2>14. Math Functions</h2>";

echo "Absolute value of -15: " . abs(-15) . "<br>";
echo "Round 4.7: " . round(4.7) . "<br>";
echo "Floor of 4.7: " . floor(4.7) . "<br>";
echo "Ceiling of 4.3: " . ceil(4.3) . "<br>";
echo "Square root of 16: " . sqrt(16) . "<br>";
echo "<br>";


// 15. COMMENTS IN PHP
// ============================================
echo "<h2>15. Comments</h2>";
// This is a single line comment
echo "Single line comment example<br>";

/* This is a multi-line comment
   It can span multiple lines
   Very useful for documentation */
echo "Multi-line comment example<br>";
echo "<br>";


echo "<h2>End of Tutorial</h2>";
?>

