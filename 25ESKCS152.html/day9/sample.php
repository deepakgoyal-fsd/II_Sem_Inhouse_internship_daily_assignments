<?php
// $name = empty($_POST['name'])?'':$_POST['name'];

// if(empty($_POST['name'])){
//     $name = "";
// }else{
//     $name = $_POST['name'];
// }

 
$name = $_POST['name'] ?? '';

if (empty($name)) {
    echo "Name is required";
} else {
    echo "Welcome $name";
}