<?php
echo "hi ","hello","world <br>";
print "hi"."world <br>";
print("hi");

echo "<br>";

$age = 18;
if($age>=18){
    print("adult");
}else{
    print("minor");
}

echo "<br>";
// $ret = (condition)? if(true) : if(false)
$ret = ($age>=18)? print("adult") : print("minor"); // ternerary condition echo ki koi return value nahi hai
// toggle wrap = alt + z 
?>

<?php
if(print("false <br>")){
    print("true <br>");
}
?>