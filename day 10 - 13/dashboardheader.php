<?php
if(!isset($_SESSION['user_name'])){
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>My Website</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <header class="bg-light border-bottom">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center py-3">
                <img src="data:image/webp;base64,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"  alt="logo" width="80">

                <!-- Navigation  -->
                 <nav>
                 <ul class="nav">
                    <li class="nav-item">
                        <a href="index.php" class="nav-link text-dark" >Home</a>
                        </li>
                    <li class="nav-item">
                        <a href="about.php" class="nav-link text-dark" >About Us</a>
                          </li>
                    <li class="nav-item">
                        <a href="contact.php" class="nav-link text-dark" >Contact Us</a>
                          </li>
                        </ul>
                           </nav>

                           <!-- login button -->
                            <button type="button" class="btn btn-primary">logout
                                 </button>

                             </div>
                        </div>
                     </header>

</body>
</html>