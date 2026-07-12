<?php

include("teacherheader.php");

include("teacherverticalcontent.php");

?>


<h2>
Welcome Teacher,
<?= $_SESSION['user_name']; ?>
</h2>


<?php

include("../dashboardfooter.php");

include("../footer.php");

?>