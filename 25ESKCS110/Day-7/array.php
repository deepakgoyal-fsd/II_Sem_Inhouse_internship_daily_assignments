<?php
echo "My (Drishti's) Friends List:"."<br>";
$friends=array("Sheetal","A","B","C");
print_r($friends);
echo "<br>";
foreach ($friends as $name){
    echo $name."<br>";
}
?>