<?php$name = empty($_POST['name'])?'':$_POST['name'];
if(empty($_POST['name'])){
    $_name="";
}
else{
    $_name=$_POST['name'];
}
//OR
$_name=$_POST['name']??'';
if(empty($_name))