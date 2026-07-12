<!-- Footer -->
<footer class="footer">

    <div class="footer-container">

        <div class="footer-left">
            <h3>🎓 Student Registration System</h3>
            <p>Manage student records efficiently and securely.</p>
        </div>

        <div class="footer-center">
            <p>&copy; <?php echo date("Y"); ?> Student Registration System</p>
            <p>All Rights Reserved.</p>
        </div>

        <div class="footer-right">
            <a href="index.php">Home</a>
            <a href="register.php">Register</a>
            <a href="#">About</a>
            <a href="#">Contact</a>
        </div>

    </div>

</footer>

<style>

.footer{
    margin-top:40px;
    background:linear-gradient(135deg,#0f172a,#1e293b);
    color:#fff;
    padding:20px 40px;
    box-shadow:0 -5px 15px rgba(0,0,0,.2);
}

.footer-container{
    display:flex;
    justify-content:space-between;
    align-items:center;
    flex-wrap:wrap;
    gap:20px;
}

.footer-left h3{
    margin-bottom:8px;
    font-size:22px;
}

.footer-left p,
.footer-center p{
    font-size:14px;
    color:#d1d5db;
}

.footer-right{
    display:flex;
    gap:18px;
    flex-wrap:wrap;
}

.footer-right a{
    color:#fff;
    text-decoration:none;
    transition:.3s;
    font-size:15px;
}

.footer-right a:hover{
    color:#38bdf8;
}

@media(max-width:768px){

.footer-container{
    flex-direction:column;
    text-align:center;
}

.footer-right{
    justify-content:center;
}

}

</style>