<?php
session_start();

// Pull back old input + errors if the user was bounced back from process.php
$errors = $_SESSION['errors'] ?? [];
$old = $_SESSION['old_input'] ?? [];
unset($_SESSION['errors'], $_SESSION['old_input']);

include 'header.php';
?>

<div class="row justify-content-center">
    <div class="col-md-8 col-lg-6">
        <div class="card card-shadow border-0">
            <div class="card-body p-4">
                <h4 class="mb-1"><i class="fa-solid fa-user-pen text-primary"></i> Student Registration</h4>
                <p class="text-muted mb-4">Fill in your details below. All fields are required.</p>

                <?php if (!empty($errors)): ?>
                    <div class="alert alert-danger">
                        <strong><i class="fa-solid fa-triangle-exclamation"></i> Please fix the following:</strong>
                        <ul class="mb-0 mt-2">
                            <?php foreach ($errors as $error): ?>
                                <li><?php echo $error; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <form action="process.php" method="POST" novalidate>

                    <div class="mb-3">
                        <label class="form-label">Full Name</label>
                        <input type="text" name="name" class="form-control"
                               value="<?php echo $old['name'] ?? ''; ?>" placeholder="e.g. Aditi Sharma">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email Address</label>
                        <input type="email" name="email" class="form-control"
                               value="<?php echo $old['email'] ?? ''; ?>" placeholder="e.g. aditi@example.com">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">CGPA (out of 10)</label>
                        <input type="number" step="0.01" min="0" max="10" name="cgpa" class="form-control"
                               value="<?php echo $old['cgpa'] ?? ''; ?>" placeholder="e.g. 8.45">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Branch</label>
                        <select name="branch" class="form-select">
                            <option value="" disabled <?php echo empty($old['branch']) ? 'selected' : ''; ?>>Select branch</option>
                            <?php
                            $branches = ['Computer Science', 'Information Technology', 'Electronics', 'Mechanical', 'Civil', 'Electrical'];
                            foreach ($branches as $branch):
                                $selected = (isset($old['branch']) && $old['branch'] === $branch) ? 'selected' : '';
                            ?>
                                <option value="<?php echo $branch; ?>" <?php echo $selected; ?>><?php echo $branch; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">College Name</label>
                        <input type="text" name="college" class="form-control"
                               value="<?php echo $old['college'] ?? ''; ?>" placeholder="e.g. XYZ Institute of Technology">
                    </div>

                    <button type="submit" class="btn btn-primary w-100">
                        <i class="fa-solid fa-paper-plane"></i> Submit Registration
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>