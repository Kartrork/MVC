<?php require_once './views/layout/nav.php' ?>
<div class="container mt-3">
    <a href="/employee/create" class="btn btn-primary">Add New</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($employees as $index => $employee): ?>
                <tr>
                    <td><?= $index + 1 ?></td>
                    <td><?= $employee['name'] ?></td>
                    <td><?= $employee['email'] ?></td>
                    <td><?= $employee['phone'] ?></td>
                    <td>
                        <a href="/employee/edit?id=<?= $employee['id'] ?>" class="btn btn-warning">Edit</a> |
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#employee<?= $employee['id'] ?>">
                            delete
                        </button> |
                        <?php require 'delete.php' ?>

                        <a href="/employee/show?id=<?= $employee['id'] ?>" class="btn btn-warning">View</a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>