<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Contact Us</title>

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:Arial,sans-serif;
}

body{
background:linear-gradient(135deg,#e3f2fd,#bbdefb,#e8f5e9);
min-height:100vh;
}

nav{
position:fixed;
top:0;
left:0;
width:100%;
background:#0d47a1;
padding:18px 50px;
display:flex;
justify-content:space-between;
align-items:center;
z-index:1000;
}

.logo{
color:white;
font-size:28px;
font-weight:bold;
}

nav ul{
display:flex;
list-style:none;
}

nav ul li{
margin-left:25px;
}

nav ul li a{
color:white;
text-decoration:none;
font-size:18px;
}

nav ul li a:hover{
color:#ffeb3b;
}

.container{
width:90%;
max-width:1100px;
margin:120px auto 50px;
display:flex;
flex-wrap:wrap;
gap:30px;
}

.left{
flex:1;
background:white;
padding:30px;
border-radius:15px;
box-shadow:0 5px 20px rgba(0,0,0,.2);
}

.right{
flex:1;
background:white;
padding:30px;
border-radius:15px;
box-shadow:0 5px 20px rgba(0,0,0,.2);
}

h2{
color:#0d47a1;
margin-bottom:20px;
}

p{
margin-bottom:15px;
font-size:17px;
line-height:1.7;
}

input,textarea{
width:100%;
padding:12px;
margin-top:10px;
margin-bottom:20px;
border:1px solid #ccc;
border-radius:8px;
font-size:16px;
}

textarea{
height:120px;
resize:none;
}

button{
width:100%;
padding:14px;
background:#1565c0;
color:white;
border:none;
border-radius:8px;
font-size:18px;
cursor:pointer;
}

button:hover{
background:#0d47a1;
}

footer{
background:#0d47a1;
color:white;
text-align:center;
padding:18px;
margin-top:40px;
}

</style>

</head>

<body>

<nav>

<div class="logo">SKIT Event Portal</div>

<ul>

<li><a href="index.php">Home</a></li>

<li><a href="about.php">About</a></li>

<li><a href="gallery.php">Gallery</a></li>

<li><a href="contact.php">Contact</a></li>

<li><a href="login.php">Admin</a></li>

</ul>

</nav>

<div class="container">

<div class="left">

<h2>Contact Information</h2>

<p><b>🏫 College:</b> Swami Keshvanand Institute of Technology, Management & Gramothan</p>

<p><b>📍 Address:</b> Ramnagaria, Jagatpura, Jaipur, Rajasthan</p>

<p><b>📞 Phone:</b> +91 141 3500300</p>

<p><b>📧 Email:</b> info@skit.ac.in</p>

<p><b>🌐 Website:</b> www.skit.ac.in</p>

<p>
For any event-related queries, registration issues, or technical support, feel free to contact the Event Management Team.
</p>

</div>

<div class="right">

<h2>Send Us a Message</h2>

<form>

<input type="text" placeholder="Your Name" required>

<input type="email" placeholder="Email Address" required>

<input type="text" placeholder="Subject" required>

<textarea placeholder="Write your message..." required></textarea>

<button type="submit">Send Message</button>

</form>

</div>

</div>

<footer>

<p>© 2026 SKIT Campus Event Management System | Developed by Akansha Sharma</p>

</footer>

</body>

</html>