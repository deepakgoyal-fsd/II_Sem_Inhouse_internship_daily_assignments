<?php

$page = "register";

include("header.php");

include("db_connect.php");

?>

<div class="card shadow p-4">

    <h2 class="text-center mb-4">
        Student Registration
    </h2>

    <form action="save_student.php" method="POST">

        <div class="mb-3">
            <label class="form-label">Student Name</label>
            <input
                type="text"
                name="name"
                class="form-control"
                required>
        </div>

        <div class="mb-3">
            <label class="form-label">Email</label>
            <input
                type="email"
                name="email"
                class="form-control"
                required>
        </div>

        <div class="mb-3">
            <label class="form-label">Branch</label>
            <input
                type="text"
                name="branch"
                class="form-control"
                required>
        </div>

        <div class="mb-3">
            <label class="form-label">CGPA</label>
            <input
                type="number"
                step="0.1"
                min="0"
                max="10"
                name="cgpa"
                class="form-control"
                required>
        </div>

        <button
            type="submit"
            class="btn btn-success w-100">

            Register Student

        </button>

    </form>

</div>

<?php

include("footer.php");

?>