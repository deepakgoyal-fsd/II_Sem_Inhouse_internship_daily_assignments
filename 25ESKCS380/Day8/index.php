<?php include "header.php"; ?>

<h2 class="text-center mb-4">Student Registration</h2>

<form action="confirm.php" method="POST" class="card p-4 shadow">

    <input class="form-control mb-3" type="text"
    name="name" placeholder="Name">

    <input class="form-control mb-3" type="email"
    name="email" placeholder="Email">

    <input class="form-control mb-3" type="number"
    step="0.1" name="cgpa" placeholder="CGPA">

    <input class="form-control mb-3" type="text"
    name="branch" placeholder="Branch">

    <input class="form-control mb-3" type="text"
    name="college" placeholder="College">

    <button class="btn btn-primary">
        Register
    </button>

</form>

<?php include "footer.php"; ?>