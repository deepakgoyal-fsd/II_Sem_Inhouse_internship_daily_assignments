<?php 

echo "Hii", "World", "You", "are","SHITTT....!!<br>";
print "Hii"."EWWWW<br>";
print ("Hii<br>");


$age = 20;

if($age>18){
    print("Adult");
}else{
    print("Kiddo");
}

echo"<br>";

//(conditon) ? if true : if false;
($age>=18)? print("Adult") : print("Kiddoo");    //tertiary operator echo has 0 return value so it can't be used here 
                                                 // print has 1 return value so we can use it 
echo"<br>"; // to break line

//$ret = (conditon) ? if true : if false;
$ret = ($age>=18)? print("Adult") : print("Kiddoo");

echo"<br>"; 

if(print("False")){  // to return 2 values at once by using one if condtion only
print("True");
}

?>