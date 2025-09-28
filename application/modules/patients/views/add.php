<!DOCTYPE html>
<html>
<head>
    <title>Add Patient</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-4">

<h2>Add Patient</h2>
<?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
<?php $form_location = base_url()."patients/add/"; ?>
<form method="post" action="<?= $form_location ?>">
    <div class="mb-3">
        <label>Name</label>
        <input type="text" name="name" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Date of Birth</label>
        <input type="date" name="dob" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Gender</label>
        <select name="gender" class="form-control" required>
            <option value="">Select</option>
            <option>Male</option>
            <option>Female</option>
            <option>Other</option>
        </select>
    </div>
    <div class="mb-3">
        <label>Phone</label>
        <input type="text" name="phone" class="form-control" required>
    </div>
    
	<button type="submit" class="btn btn-primary" name="submit" value="Submit">Save</button>
    <a href="<?= base_url('patients'); ?>" class="btn btn-secondary">Cancel</a>
</form>

</body>
</html>
