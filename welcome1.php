<html>
    <body>
        <?php

     $name ="Ayushi Kumar";
     $currentdate= "2026-07-04" ;
     $FavouriteProgrammingLanguage= "HTML,CSS";

     ?>

     <h1><?=$name?> </h1>
     <p><?=$currentdate?></p>
     <p><?=$FavouriteProgrammingLanguage?></p>

     <p>Date:<?=date("Y-m-d H:i:s")?></p>
     <p>You are visiting from:<?=$_SERVER["REMOTE_ADDR"]?></p>
</body>
</html>
