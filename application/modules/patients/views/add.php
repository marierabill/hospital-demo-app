<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Patient</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Add New Patient</h4>
        </div>
        <div class="card-body">
            
            <!-- Display validation errors -->
            <?php if(validation_errors()): ?>
                <div class="alert alert-danger">
                    <?= validation_errors(); ?>
                </div>
            <?php endif; ?>

            <!-- Patient Form -->
            <?php $form_location = base_url("patients/add"); ?>
            <form method="post" action="<?= $form_location ?>" novalidate>
                <!-- CSRF Token -->
                <?= form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash()); ?>

                <div class="mb-3">
                    <label for="name" class="form-label">Full Name</label>
                    <input type="text" name="name" id="name" 
                           value="<?= set_value('name'); ?>" 
                           class="form-control <?= form_error('name') ? 'is-invalid' : '' ?>" required>
                    <div class="invalid-feedback"><?= form_error('name'); ?></div>
                </div>

                <div class="mb-3">
                    <label for="dob" class="form-label">Date of Birth</label>
                    <input type="date" name="dob" id="dob" 
                           value="<?= set_value('dob'); ?>" 
                           class="form-control <?= form_error('dob') ? 'is-invalid' : '' ?>" required>
                    <div class="invalid-feedback"><?= form_error('dob'); ?></div>
                </div>

                <div class="mb-3">
                    <label for="gender" class="form-label">Gender</label>
                    <select name="gender" id="gender" 
                            class="form-select <?= form_error('gender') ? 'is-invalid' : '' ?>" required>
                        <option value="">Select</option>
                        <option value="Male" <?= set_select('gender','Male'); ?>>Male</option>
                        <option value="Female" <?= set_select('gender','Female'); ?>>Female</option>
                        <option value="Other" <?= set_select('gender','Other'); ?>>Other</option>
                    </select>
                    <div class="invalid-feedback"><?= form_error('gender'); ?></div>
                </div>

                <div class="mb-3">
                    <label for="phone" class="form-label">Phone Number</label>
                    <input type="text" name="phone" id="phone" 
                           value="<?= set_value('phone'); ?>" 
                           class="form-control <?= form_error('phone') ? 'is-invalid' : '' ?>" required>
                    <div class="invalid-feedback"><?= form_error('phone'); ?></div>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="<?= base_url('patients'); ?>" class="btn btn-secondary">Cancel</a>
                    <button type="submit" class="btn btn-primary" name="submit" value="Submit">Save Patient</button>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>
