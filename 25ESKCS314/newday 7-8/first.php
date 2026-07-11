<?php
//echo date("d-m-y");
//phpinfo();
//echo $_SERVER['REMOTE_ADDR'];
$name = "John";
echo "Hello $name";
$student = ["John", "Doe", "Jane"];
echo "<br>";    
echo $student[0];
echo "<br>";
print_r($student);

$student_marks = [12,45,67];
print_r($student_marks);

$students = [
    "John" => 12,
    "Doe" => 45,
    "Jane" => 67
];
print_r($students);
echo "<pre>";
print_r($_SERVER);
echo "</pre>";
?>