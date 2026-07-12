<?php
include("header.php");
?>

<div class="container mt-5" style="max-width:600px">

    <h2>Contact Us</h2>

    <form action="send.php" method="post">
        <input type="text" name="name" class="form-control mb-3" placeholder="Your Name" required>

        <input type="email" name="email" class="form-control mb-3" placeholder="Your Email" required>

        <textarea name="message" class="form-control mb-3" rows="5" placeholder="Your Message" required></textarea>

        <button type="submit" class="btn btn-success">Send Message</button>
    </form>

    <hr>

    <p><strong>Email:</strong> info@example.com</p>
    <p><strong>Phone:</strong> +91 98765 43210</p>
    <p><strong>Address:</strong> Your City, India</p>

</div>

<?php
include("fotter.php");
?>
