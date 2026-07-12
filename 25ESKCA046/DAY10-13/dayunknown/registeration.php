<?php
include ("checkRegistrationError.php");
include ("header.php");
include ("db_connect.php");
?>
<div class="container mt-5" style="max-width:450px;">
    <div class="card shadow-sm border-0">
        <div class="card-body p-4">
            <form action="" method="post">
                <h2 class="mb-4 text-center">Register</h2>
                
                <input type="text" name="name" class="form-control mb-3 bg-light" placeholder="Name" value="<?= $name?>">
                <input type="email" class="form-control mb-3 bg-light" name="email" placeholder="Email" value="<?= $email?>">
                
                <!-- Role Dropdown we discussed earlier -->
                <select name="role" class="form-select mb-3 bg-light" required>
                    <option value="" disabled selected>Select your Role</option>
                    <option value="Student">Student</option>
                    <option value="Teacher">Teacher</option>
                    <option value="Admin">Admin</option>
                    <option value="SuperAdmin">Super Admin</option>
                </select>

                <input type="password" class="form-control mb-3 bg-light" placeholder="Password" name="password" value="<?= $password?>">
                <input type="password" class="form-control mb-4 bg-light" placeholder="Confirm Password" name="confirmPassword" value="<?= $confirmPassword?>">
                
                <button class="btn btn-primary w-100">Register</button>
            </form>
        </div>
    </div>
</div>
<?php  
include ("footer.php");
?>