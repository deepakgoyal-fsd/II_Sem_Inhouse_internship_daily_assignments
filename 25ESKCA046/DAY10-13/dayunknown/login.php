<?php 
include("db_connect.php"); 
include("checkLoginError.php"); 
include("header.php"); 
?> 

<div class="container mt-5" style="max-width:400px;">


    <?php if(!empty($error)): ?>
        <div class="alert alert-danger text-center shadow-sm"><?php echo $error; ?></div>
    <?php endif; ?>

    <div class="card shadow-sm border-0">
        <div class="card-body p-4">
            

            <form action="login.php" method="POST">
                <h3 class="mb-4 text-center text-primary">Login</h3>
                
                <div class="mb-3">
                    <input type="email" class="form-control form-control-lg bg-light" name="email" placeholder="Email" value="<?php echo htmlspecialchars($email); ?>" required>
                </div>
                
                <div class="mb-4">
                    <input type="password" class="form-control form-control-lg bg-light" placeholder="Password" name="password" required>
                </div>
                
                <button type="submit" class="btn btn-primary w-100 btn-lg">Login</button>
            </form>
            
        </div>
    </div>
</div>

<?php   
include("footer.php"); 
?>