<!DOCTYPE html>
<html>
<head>
    <title>Patients List</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-4">

<h2>Patients</h2>
<a href="<?= base_url('patients/add'); ?>" class="btn btn-primary mb-3">Add Patient</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th><th>Name</th><th>DOB</th><th>Gender</th><th>Phone</th><th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($patients->result() as $patient): ?>
        <tr>
            <td><?php echo $patient->id; ?></td>
            <td><?php echo $patient->name; ?></td>
            <td><?php echo $patient->dob; ?></td>
            <td><?php echo $patient->gender; ?></td>
            <td><?php echo $patient->phone; ?></td>
            <td>
                <a href="<?php echo site_url('patients/edit/'.$patient->id); ?>" class="btn btn-warning btn-sm">Edit</a>
                <a href="<?php echo site_url('patients/delete/'.$patient->id); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Delete this record?')">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

</body>
</html>
