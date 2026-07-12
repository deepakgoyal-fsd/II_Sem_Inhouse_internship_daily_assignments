<?php
session_start();
include("header.php");
?>

<div class="container mt-5" style="max-width:500px;">

    <h2>Contact Us</h2>

    <form>

        <div class="mb-3">

            <label>Name</label>

            <input
                type="text"
                class="form-control"
                placeholder="Enter your name">

        </div>

        <div class="mb-3">

            <label>Email</label>

            <input
                type="email"
                class="form-control"
                placeholder="Enter your email">

        </div>

        <div class="mb-3">

            <label>Message</label>

            <textarea
                class="form-control"
                rows="5"
                placeholder="Enter your message"></textarea>

        </div>

        <button class="btn btn-primary">
            Send
        </button>

    </form>

</div>

<?php
include("footer.php");
?>