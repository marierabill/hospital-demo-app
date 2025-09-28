<!DOCTYPE html>
<html>
<head>
    <title>Edit Patient</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-4">

<h2>Edit Patient</h2>
<form method="post">
    <div class="mb-3">
        <label>Name</label>
        <input type="text" name="name" value="<?php echo $patient->name; ?>" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Date of Birth</label>
        <input type="date" name="dob" value="<?php echo $patient->dob; ?>" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Gender</label>
        <select name="gender" class="form-control" required>
            <option value="Male" <?php if($patient->gender=='Male') echo 'selected'; ?>>Male</option>
            <option value="Female" <?php if($patient->gender=='Female') echo 'selected'; ?>>Female</option>
            <option value="Other" <?php if($patient->gender=='Other') echo 'selected'; ?>>Other</option>
        </select>
    </div>
    <div class="mb-3">
        <label>Phone</label>
        <input type="text" name="phone" value="<?php echo $patient->phone; ?>" class="form-control" required>
    </div>
	<button type="submit" class="btn btn-primary" name="submit" value="Submit">Update</button>
    <a href="<?php echo site_url('patients'); ?>" class="btn btn-secondary">Cancel</a>
</form>

</body>
</html>
