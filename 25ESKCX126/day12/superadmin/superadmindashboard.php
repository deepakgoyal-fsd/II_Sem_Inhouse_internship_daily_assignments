<?php

include("superadminheader.php");

include("superadminverticalcontent.php");

?>


<h2>

Welcome Superadmin,
<?= $_SESSION['user_name']; ?>

</h2>



<?php

include("../dashboardfooter.php");

include("../footer.php");

?>