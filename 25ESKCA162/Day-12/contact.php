<?php
session_start();

if (isset($_SESSION['user_id'])) {
    include 'dashboardheader.php';
    include 'header.php';
} else {
    include 'logindashboard.php';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Contact Us</title>

<style>
body{
    margin:0;
    font-family:Arial, Helvetica, sans-serif;
    background:#f4f7fc;
}

.contact-section{
    max-width:1100px;
    margin:50px auto;
    padding:20px;
}

.contact-container{
    display:flex;
    flex-wrap:wrap;
    gap:30px;
}

.contact-form,
.contact-info{
    flex:1;
    min-width:320px;
    background:#fff;
    padding:30px;
    border-radius:15px;
    box-shadow:0 8px 20px rgba(0,0,0,0.15);
}

h2{
    color:#0d6efd;
    text-align:center;
    margin-bottom:25px;
}

label{
    display:block;
    font-weight:bold;
    margin-top:15px;
    margin-bottom:6px;
}

input,
textarea{
    width:100%;
    padding:12px;
    border:1px solid #ccc;
    border-radius:8px;
    font-size:15px;
    box-sizing:border-box;
}

textarea{
    resize:vertical;
    height:120px;
}

button{
    width:100%;
    margin-top:20px;
    padding:12px;
    background:#0d6efd;
    color:#fff;
    border:none;
    border-radius:8px;
    font-size:17px;
    cursor:pointer;
}

button:hover{
    background:#0b5ed7;
}

.info-item{
    margin-bottom:20px;
    font-size:17px;
    line-height:1.8;
}

.info-item strong{
    color:#0d6efd;
}

.note{
    margin-top:20px;
    padding:15px;
    background:#e9f5ff;
    border-left:5px solid #0d6efd;
    border-radius:8px;
}

.footer-space{
    height:40px;
}

@media(max-width:768px){
.contact-container{
flex-direction:column;
}
}
</style>

</head>

<body>

<div class="contact-section">

<div class="contact-container">

<div class="contact-form">

<h2>Contact Us</h2>

<form action="#" method="post">

<label>Full Name</label>
<input type="text" name="name" placeholder="Enter your name" required>

<label>Email Address</label>
<input type="email" name="email" placeholder="Enter your email" required>

<label>Subject</label>
<input type="text" name="subject" placeholder="Enter subject" required>

<label>Message</label>
<textarea name="message" placeholder="Write your message here..." required></textarea>

<button type="submit">Send Message</button>

</form>

</div>

<div class="contact-info">

<h2>Contact Information</h2>

<div class="info-item">
<strong>📧 Email</strong><br>
parvinchoudhary7777@gmail.com
</div>

<div class="info-item">
<strong>📞 Contact Number</strong><br>
+91 9166102422
</div>

<div class="info-item">
<strong>📍 Address</strong><br>
Swami Keshvanand Institute of Technology (SKIT), Jaipur, Rajasthan
</div>

<div class="note">
<strong>Industrial Training Management System</strong><br><br>
If you have any questions, suggestions or require technical assistance regarding the Industrial Training Management System, feel free to contact us using the form or the contact details provided. We will respond as soon as possible.
</div>

</div>

</div>

<div class="footer-space"></div>

</div>

<?php include 'footer.php'; ?>

</body>
</html>