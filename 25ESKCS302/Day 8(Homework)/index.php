<?php include("header.php"); ?>
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow-lg">
            <div class="card-header bg-success text-white text-center">
                <h2>Student Registration Form</h2>
            </div>
            <div class="card-body">
                <form action="process.php" method="POST">
                    <div class="mb-3">
                        <label class="form-label">Full Name</label>
                        <input
                            type="text"
                            class="form-control"
                            name="name"
                            placeholder="Enter your full name"
                            required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email Address</label>
                        <input
                            type="email"
                            class="form-control"
                            name="email"
                            placeholder="Enter your email"
                            required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Phone Number</label>
                        <input
                            type="tel"
                            class="form-control"
                            name="phone"
                            placeholder="Enter 10-digit phone number"
                            pattern="[0-9]{10}"
                            maxlength="10"
                            required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input
                            type="password"
                            class="form-control"
                            name="password"
                            placeholder="Enter password"
                            minlength="6"
                            required>
                    </div>
                        <div class="mb-3">
                        <label class="form-label">Confirm Password</label>
                        <input
                            type="password"
                            class="form-control"
                            name="confirm_password"
                            placeholder="Re-enter password"
                            minlength="6"
                            required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label d-block">Gender</label>
                        <div class="form-check form-check-inline">
                            <input
                                class="form-check-input"
                                type="radio"
                                name="gender"
                                value="Male"
                                required>
                            <label class="form-check-label">Male</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input
                                class="form-check-input"
                                type="radio"
                                name="gender"
                                value="Female">
                            <label class="form-check-label">Female</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input
                                class="form-check-input"
                                type="radio"
                                name="gender"
                                value="Other">
                            <label class="form-check-label">Other</label>
                        </div>
                    </div>
                   
                    <div class="mb-3">
                        <label class="form-label">City</label>
                        <select class="form-select" name="city" required>
                            <option value="">-- Select City --</option>
                            <option>Jaipur</option>
                            <option>Delhi</option>
                            <option>Mumbai</option>
                            <option>Udaipur</option>
                            <option>Jodhpur</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Address</label>
                        <textarea
                            class="form-control"
                            name="address"
                            rows="3"
                            placeholder="Enter your address"
                            required></textarea>
                    </div>
                    <div class="form-check mb-3">
                        <input
                            class="form-check-input"
                            type="checkbox"
                            name="terms"
                            required>
                        <label class="form-check-label">
                            I agree to the Terms & Conditions
                        </label>
                    </div>
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-success">
                            Register
                        </button>
                        <button type="reset" class="btn btn-secondary">
                            Reset
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include("footer.php"); ?>