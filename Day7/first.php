


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>

  <h1>hello i am learning php</h1>




  <?php



echo "Hello World <br>";
phpinfo();

print "hello";
die();

echo date('d m y');
echo "<br>";
// phpinfo():
  echo $_SERVER['REMOTE_ADDR'];
  echo "<br>";
 echo $name= "rahul<br>";
 $students = ["rahul","jitesh","aman"];
 echo "<br>";
 echo $students[0];
  echo "<br>";
 echo $students[1];
  echo "<br>";
 echo $students[2];
  echo "<br>";
 print_r($students);
  echo "<br>";
   $students=[12,13,14];
    echo "<br>";
   print_r($students);
    echo "<br>";
   echo $_SERVER['HTTP_USER_AGENT'];
    echo "<br>";
   $x = 10;
   $y = 20;
   $z = $x + $y;
   echo "<br>";
   echo $z;
   echo "<br>";
    $name = "Rahul";
    $age = 20;
     $city = "pali";
     echo "My name is $name and my age is $age and i am from $city";
     echo "<br>";
   var_dump($name);  // var_dump() function is used to display structured information about one or more expressions that includes its type and value.
   echo "<br>";
   $x=$y=$z=10;   // multiple assignment
   echo $x; 
   echo "<br>";
    echo $y;
      echo "<br>";
    echo $z;  
    echo "<br>";
    echo "My name is $name and my age is $age and i am from $city";// both will give same output
    echo "<br>";    
    echo ("My name is $name and my age is $age and i am from $city");// both will give same output);
    echo "<br>";
    echo "this", "is", "a", "test"; // multiple echo statements
    echo "<br>";
    echo 'this'.$z.'is a test'; // concatenation operator
    echo "<br>";
     $c = 'jodhpur';   // string variable
     echo "<br>";
    var_dump($c);
     echo "<br>";
   $cars = array("Volvo", "BMW", "Toyota");  // array variable, this is how we can create an array in php
   echo "<br>";
  var_dump($cars);
  echo "<br>";


   class Car {
  public $color;
  public $model;
  public function __construct($color, $model) {
    $this->color = $color;
    $this->model = $model;
  }
  public function message() {
    return "My car is a " . $this->color . " " . $this->model . "!";
  }
}

$myCar = new Car("red", "Volvo");
echo "<br>";
var_dump($myCar);  
echo "<br>";
$x = 5;
$x = (string) $x;   //this is known as CASTING in which you can change the data type of a variable.As here we have changed the integer to string.
var_dump($x);

echo str_word_count("Hello world!");  // this function will count the numner of words in the string.
       
echo strlen("hello how are you");   //this will return length of the string.
  
$txt = "I really love PHP!";
var_dump(str_contains($txt, "love"));   // str_contains(): tells about if any substring contains in the main string if yes it will return a bool(true) otherwise bool(false). and the var_dump function here is finding the type of above mentioned function which is definitely a bool because it returns true or false.
// Note: This function (str_constains();) performs a case-sensitive search.

$x = "Hello World!";
echo strtoupper($x); // this function will convert  the string to uppercase.
// and similiarly for strtolower():

  $x = "Hello World!";
echo str_replace("World", "Dolly", $x); // this is how we can replace some part of any string with the help of str_replace.

$x = "Hello World!";
echo strrev($x);  // this function will reverse the string.

$x = "    Hello World! ";
echo trim($x); // this function remove whitespace from beginning and end if present not from between of the string.

//    if (str_contains($_SERVER['HTTP_USER_AGENT'], 'Firefox')) {
//     echo 'You are using Firefox.'
//    };
       

// if (str_contains($_SERVER['HTTP_USER_AGENT'], 'Firefox')) {
//     echo 'You are using Firefox.';




?>
</body>
</html>


















