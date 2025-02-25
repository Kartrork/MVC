<?php require_once 'views/layout/header.php'; ?>

<div class="container mt-3">
    <h3>Employee Details</h3>
    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <td><?= $employee['employee_id']  ?></td>
        </tr>
        <tr>
            <th>Name</th>
            <td><?= $employee['name'] ?></td>
        </tr>
        <tr>
            <th>Email</th>
            <td><?= $employee['email'] ?></td>
        </tr>
        <tr>
            <th>Phone</th>
            <td><?= $employee['phone'] ?></td>
        </tr>
        <tr>
            <th>Department</th>
            <td><?= $employee['department'] ?> </td>
        </tr>
    </table>
    <a href="/employee" class="btn btn-secondary">Back to Employee List</a>
</div>

<?php require_once 'views/layout/footer.php'; ?>