<?php
 require "header.php";
?>
<main>
    <form class="form" action="welcome.php" method="post" >
        <div class="form-container">
            <div>
                <label for="user">Username</label>
                <input type="text" placeholder="Enter Your Username" id="user" name="user">
            </div>
            <div>
                <p class="user-error" style="color: red;"></p>
            </div>
            <div>
                <label for="mobile">Mobile No</label>
                <input type="tel" placeholder="Enter Your Mobile No" id="mobile" name="mobile">
            </div>
            <div>
                <p class="mobile-error" style="color: red;"></p>
            </div>
            <div>
                <label for="email">Email</label>
                <input type="email" placeholder="Enter Your Email" id="email" name="email">
            </div>
            <div>
                <p class="email-error" style="color: red;"></p>
            </div>
            <div>
                <label for="pass">Set Password</label>
                <input type="password" placeholder="Enter Your Password" id="pass" name="pass">
            </div>
            <div class="show-pass-container">
                <input id="showPass" type="checkbox">
                <label for="showPass">Show Password</label>
            </div>
            <div>
                <p class="pass-error" style="color: red;"></p>
            </div>
            <div>
            <button id="register" name="register">Register</button>
            </div> 
        </div>
    </form>
</main>
<?php
require "footer.php";
?>    
    









    