<?php
$variable = empty($_POST['name']) ? '' : $_POST['name'];

if(empty($_POST['name'])){
    echo "Name is required";
}
else{
    echo "Name: ".$_POST['name'];
}
?>