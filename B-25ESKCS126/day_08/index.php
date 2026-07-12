<?php
include "header.php";
?>

<div class="row justify-content-center">

    <div class="col-lg-8">

        <div class="card shadow-lg border-0">

            <div class="card-header bg-primary text-white text-center">

                <h2>
                    <i class="fa-solid fa-user-plus"></i>
                    Student Registration Form
                </h2>

                <p class="mb-0">
                    Fill in your details below
                </p>

            </div>

            <div class="card-body p-4">

                <form action="process.php" method="POST">

                    <!-- Name -->
                    <div class="mb-3">
                        <label class="form-label">
                            <i class="fa-solid fa-user"></i>
                            Full Name
                        </label>

                        <input
                            type="text"
                            class="form-control"
                            name="name"
                            placeholder="Enter your full name"
                            required>
                    </div>

                    <!-- Email -->
                    <div class="mb-3">
                        <label class="form-label">
                            <i class="fa-solid fa-envelope"></i>
                            Email Address
                        </label>

                        <input
                            type="email"
                            class="form-control"
                            name="email"
                            placeholder="Enter your email"
                            required>
                    </div>

                    <!-- CGPA -->
                    <div class="mb-3">
                        <label class="form-label">
                            <i class="fa-solid fa-star"></i>
                            CGPA
                        </label>

                        <input
                            type="number"
                            step="0.01"
                            min="0"
                            max="10"
                            class="form-control"
                            name="cgpa"
                            placeholder="Enter CGPA"
                            required>
                    </div>

                    <!-- Branch -->
                    <div class="mb-3">

                        <label class="form-label">
                            <i class="fa-solid fa-code-branch"></i>
                            Branch
                        </label>

                        <select class="form-select" name="branch" required>

                            <option value="">Choose Branch</option>

                            <option>CSE</option>

                            <option>CSE (AI)</option>

                            <option>CSE (Data Science)</option>

                            <option>IT</option>

                            <option>ECE</option>

                            <option>EE</option>

                            <option>ME</option>

                            <option>CE</option>

                        </select>

                    </div>

                    <!-- College -->
                    <div class="mb-3">

                        <label class="form-label">
                            <i class="fa-solid fa-building-columns"></i>
                            College
                        </label>

                        <input
                            type="text"
                            class="form-control"
                            name="college"
                            placeholder="Enter your college"
                            required>

                    </div>

                    <!-- Profile Photo Placeholder -->
                    <div class="text-center mb-4">

                        <img src="https://placehold.co/150x150?text=Photo"
                             class="rounded-circle border shadow"
                             width="150"
                             height="150">

                        <p class="text-muted mt-2">
                            <i class="fa-solid fa-camera"></i>
                            Profile Photo Placeholder
                        </p>

                    </div>

                    <!-- Submit Button -->

                    <div class="d-grid">

                        <button
                            type="submit"
                            class="btn btn-primary btn-lg">

                            <i class="fa-solid fa-paper-plane"></i>

                            Submit Registration

                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</div>

<?php
include "footer.php";
?>