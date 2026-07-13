<!-- <?php
echo"hello";
?> -->

<!-- <?php
$cel=25;
$far=($cel*1.8)+32;
echo $far;
?> -->

<!-- <?php
function even_odd($num){
    if($num%2==0){
        echo "even";
    }
    else{
        echo "odd";
    }
}
even_odd(88);
?> -->
<!-- 
<?php
$username="Devansh";
if(isset($_GET["username"])){
echo $_GET["username"];
}
?> -->

<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="get">
        <label for="username">USERNAME:</label>
        <input type="text" name="username" id="username" placeholder="enter your username">
    
    </form>
    
</body>
</html> -->


 <!-- <?php
function age($num){
    if($num>=18){
        echo"eligible";
    }
    else{
      echo  "not eligible";
    }
}
age(18);
?>  -->



<!-- <?php
$grade =[
    [
       "name"=>"Devansh",
        "marks"=>99,
        "branch"=>"cse"
    ],
    [
        "name"=>"Deepak",
        "marks"=>80,
        "branch"=>"ai"
    ],
    [
    "name"=>"Harsh",
    "marks"=>95,
    "branch"=>"ds"
    ]
];
var_dump($grade);
?> -->


<!-- multiplicatin table -->
 <!-- <?php
 $num=5;
 for($i=0;$i<=10;$i++) {
    $table=$num*$i;
    echo("$num*$i=$table <br>");
    
 } 
 ?> -->


<!-- factorial -->
 <!-- <?php
 function fact($n){
    $f=1;
    for($i=1;$i<=$n;$i++){
       $f=$f*$i;

    }
    echo($f);
 }
 fact(5);
 ?> -->
