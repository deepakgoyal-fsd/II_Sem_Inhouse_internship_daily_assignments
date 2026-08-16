<?php
//echo is faster than print means take less time to be executed
echo "Hi","world","m <br>";
print"Hi"."world"."m <br>";
print("hi");
$age=18;   

//by if else statement
if($age>=18){
    echo("true");
}else{
    echo("false");
}

//echo and print both can use in if else statement
//print can but echo cant use in ternory operators (?:)
//print have a return value which is 1

echo "<br>"; 

//by ternory operators(?:)
$ret=($age>=18)? print("adult"):print("teenager");



//by if only and true and false comes together
if(print("true <br>")){
    print("false");
}






?>
