<?php

session_start();

 if (!isset($_SESSION['user_id'])) {

    header("Location: login.php");
    exit();

}

?>
<?php
$page = "register";
include 'header.php';
?>

<div class="row justify-content-center">

    <div class="col-lg-8">

        <div class="card shadow border-0">

            <div class="card-header text-white"
                 style="background:linear-gradient(to right,#0d6efd,#6610f2);">

                <h3 class="mb-0">
                    <i class="fa-solid fa-user-plus"></i>
                    Student Registration Form
                </h3>

            </div>

            <div class="card-body">

               

                <form action="process.php" method="POST">

                    <div class="row">

                        <div class="col-md-6 mb-3">

                            <label class="form-label">
                                Full Name
                            </label>

                            <input
                                type="text"
                                name="name"
                                class="form-control"
                                placeholder="Enter your full name"
                                required>

                        </div>

                        <div class="col-md-6 mb-3">

                            <label class="form-label">
                                Email Address
                            </label>

                            <input
                                type="email"
                                name="email"
                                class="form-control"
                                placeholder="Enter your email"
                                required>

                        </div>

                    </div>

                    <div class="row">

                        <div class="col-md-6 mb-3">

                            <label class="form-label">
                                CGPA
                            </label>

                            <input
                                type="number"
                                step="0.1"
                                min="0"
                                max="10"
                                name="cgpa"
                                class="form-control"
                                placeholder="Enter CGPA"
                                required>

                        </div>

                        <div class="col-md-6 mb-3">

                            <label class="form-label">
                                Branch
                            </label>

                            <input
                                type="text"
                                name="branch"
                                class="form-control"
                                placeholder="Enter Branch"
                                required>

                        </div>

                    </div>
<div class="row">

    <div class="col-md-6 mb-3">

        <label class="form-label">
            Phone Number
        </label>

        <input
            type="text"
            name="phone"
            class="form-control"
            placeholder="Enter Phone Number"
            maxlength="10"
            required>

    </div>

    <div class="col-md-6 mb-3">

        <label class="form-label">
            City
        </label>

        <input
            type="text"
            name="city"
            class="form-control"
            placeholder="Enter City"
            required>

    </div>

</div>
                    <div class="mb-3">

                        <label class="form-label">
                            College Name
                        </label>

                        <input
                            type="text"
                            name="college"
                            class="form-control"
                            placeholder="Enter College Name"
                            required>

                    </div>

                    <div class="mb-3">

                        <label class="form-label d-block">
                            Gender
                        </label>

                        <div class="form-check form-check-inline">

                            <input
                                class="form-check-input"
                                type="radio"
                                name="gender"
                                value="Male">

                            <label class="form-check-label">
                                Male
                            </label>

                        </div>

                        <div class="form-check form-check-inline">

                            <input
                                class="form-check-input"
                                type="radio"
                                name="gender"
                                value="Female">

                            <label class="form-check-label">
                                Female
                            </label>

                        </div>

                        <div class="form-check form-check-inline">

                            <input
                                class="form-check-input"
                                type="radio"
                                name="gender"
                                value="Other">

                            <label class="form-check-label">
                                Other
                            </label>

                        </div>

                    </div>

                    <div class="mb-3">

                        <label class="form-label">
                            Course
                        </label>

                        <select
                            name="course"
                            class="form-select"
                            required>

                            <option value="">
                                Select Course
                            </option>

                            <option>
                                Computer Science Engineering
                            </option>

                            <option>
                                Information Technology
                            </option>

                            <option>
                                Electronics Engineering
                            </option>

                            <option>
                                Mechanical Engineering
                            </option>

                        </select>

                    </div>

                    <div class="mb-3">

                        <label class="form-label">
                            Address
                        </label>

                        <textarea
                            name="address"
                            rows="4"
                            class="form-control"
                            placeholder="Enter your address"
                            required></textarea>

                    </div>

                    <div class="mb-4">

                        <label class="form-label">
                            Profile Photo
                        </label>

                        <input
                            type="file"
                            class="form-control">

                        <div class="form-text">

                            Upload feature will be added in the next session.

                        </div>

                    </div>

                    <button
                        type="submit"
                        class="btn btn-primary">

                        <i class="fa-solid fa-paper-plane"></i>

                        Submit

                    </button>

                    <button
                        type="reset"
                        class="btn btn-secondary">

                        Reset

                    </button>

                </form>

            </div>

        </div>

    </div>

</div>

<?php
include 'footer.php';
?>