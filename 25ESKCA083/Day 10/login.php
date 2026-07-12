<?php
include("checkloginerror.php");
include("headerlogin.php");
?>

<div class="container mt-5" style="max-width:400px;">
    <form action="" method="post">
        <h3 class="mb-3">Login</h3>
        
        <?php if (!empty($error)): ?>
            <div class="alert alert-danger py-2"><?php echo $error; ?></div>
        <?php endif; ?>
        <input type="email" name="email" class="form-control mb-3" placeholder="email" required>
        <input type="password" name="password" class="form-control mb-3" placeholder="password" autocomplete="new-password" required>
        
        <button class="btn btn-primary w-100" type="submit">Login</button>
    </form>
</div>

<?php
include("footer.php");
?>