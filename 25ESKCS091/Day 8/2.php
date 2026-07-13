<!-- <?php
$marks=68;
if($marks>90){
    echo("outstanding");
}
else if($marks>75 and $marks<89){
    echo("excellent");
}
else if($marks>60 and $marks<74){
    echo("good");
}
else{
    echo("need improvement");
}
?> -->


<?php
$role="student";
switch($role){
    case "admin":
        echo"hello admin";
        break;
    case "student":
        echo"hello student";
        break;
    case "teacher":
        echo"hello teacher" ;       

}
?>
