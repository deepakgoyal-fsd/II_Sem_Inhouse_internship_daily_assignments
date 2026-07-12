<?php
session_start();

include("header.php");
?>

<div class="container mt-5">

    <div class="p-5 bg-light rounded">

        <h1>Welcome to My Website</h1>

        <p class="lead">
            This is our home page.
            Here you can find information about our services and activities.
        </p>


        <?php

        if(isset($_SESSION['user_id'])){

        ?>

            <div class="alert alert-success">
                You are already logged in.
            </div>

            <?php

if($_SESSION['user_role'] == "admin"){

?>

<a href="/day12/admin/admindashboard.php" class="btn btn-primary">
    Go To Dashboard
</a>


<?php

}
elseif($_SESSION['user_role'] == "superadmin"){

?>

<a href="/day12/dashboard.php" class="btn btn-primary">
    Go To Dashboard
</a>


<?php

}
elseif($_SESSION['user_role'] == "teacher"){

?>

<a href="/day12/dashboard.php" class="btn btn-primary">
    Go To Dashboard
</a>


<?php

}
elseif($_SESSION['user_role'] == "student"){

?>

<a href="/day12/dashboard.php" class="btn btn-primary">
    Go To Dashboard
</a>


<?php

}
else{

?>

<a href="/day12/dashboard.php" class="btn btn-primary">
    Go To Dashboard
</a>


<?php

}

?>


        <?php

        }else{

        ?>

            <a href="/day12/registration.php" class="btn btn-primary">
                Get Started
            </a>


        <?php

        }

        ?>

    </div>

</div>


<?php
include("footer.php");
?>