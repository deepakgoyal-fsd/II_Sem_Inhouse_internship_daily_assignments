<?php
 require "header.php";
?>
<div style="
max-width:450px;
margin:50px auto;
background:#fff;
padding:35px;
border-radius:12px;
box-shadow:0 6px 20px rgba(0,0,0,.15);
font-family:Arial,sans-serif;">

    <h2 style="
    text-align:center;
    color:#2563eb;
    margin-bottom:30px;">
        Create Account
    </h2>

    <form class="form" action="welcome.php" method="post">

        <label style="font-weight:bold;">Username</label>

        <input
        id="user"
        type="text"
        name="user"
        placeholder="Enter Your Username"

        style="
        width:100%;
        padding:12px;
        margin-top:8px;
        margin-bottom:5px;
        border:1px solid #ccc;
        border-radius:8px;
        font-size:16px;
        box-sizing:border-box;">

        <p class="user-error" style="color:red;margin:0 0 18px 0;"></p>


        <label style="font-weight:bold;">Mobile Number</label>

        <input
        id="mobile"
        type="tel"
        name="mobile"
        placeholder="Enter Your Mobile Number"

        style="
        width:100%;
        padding:12px;
        margin-top:8px;
        margin-bottom:5px;
        border:1px solid #ccc;
        border-radius:8px;
        font-size:16px;
        box-sizing:border-box;">

        <p class="mobile-error" style="color:red;margin:0 0 18px 0;"></p>


        <label style="font-weight:bold;">Email Address</label>

        <input
        id="email"
        type="email"
        name="email"
        placeholder="Enter Your Email"

        style="
        width:100%;
        padding:12px;
        margin-top:8px;
        margin-bottom:5px;
        border:1px solid #ccc;
        border-radius:8px;
        font-size:16px;
        box-sizing:border-box;">

        <p class="email-error" style="color:red;margin:0 0 18px 0;"></p>


        <label style="font-weight:bold;">Create Password</label>

        <input
        id="pass"
        type="password"
        name="pass"
        placeholder="Enter Your Password"

        style="
        width:100%;
        padding:12px;
        margin-top:8px;
        border:1px solid #ccc;
        border-radius:8px;
        font-size:16px;
        box-sizing:border-box;">

        <div style="margin:15px 0;">

            <label style="cursor:pointer;">

                <input id="showPass" type="checkbox">

                Show Password

            </label>

        </div>

        <p class="pass-error" style="color:red;margin-bottom:20px;"></p>

        <button
        id="register"
        name="register"

        style="
        width:100%;
        background:#2563eb;
        color:white;
        border:none;
        padding:14px;
        border-radius:8px;
        font-size:18px;
        font-weight:bold;
        cursor:pointer;"
         onmouseover="this.style.color='#4f0720'"
onmouseout="this.style.color='white'">

            Register

        </button>

    </form>

    <p style="
    text-align:center;
    margin-top:25px;
    color:#555;">

        Already have an account?

        <a href="login.php"
        style="
        color:#2563eb;
        text-decoration:none;
        font-weight:bold;"
        >

            Login Here

        </a>

    </p>

</div>


<?php
require "footer.php";
?>    
    









    