<?php
echo "Hi","world<br>";
Print "Hi<br>";
Print ("Hi");
$age=18;
if($age>=18){
    print("adult");
}
else{
    print("teenager");
}
//(condition)? if true:if false
$ret=($age>=18)? print("adult"): print("teenager");//ternary operator
if(print("false<br>")){
    print("true");
}
?>

<?php
if(true){
    echo"true<br>";
}
if(false){
    echo"false<br>";
}
?>

<?php
$condition=true;
if($condition){
    echo"true<br>";
}else{
    echo"false<br>";
}

?>