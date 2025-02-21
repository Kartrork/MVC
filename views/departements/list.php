<?php require_once './views/layout/nav.php' ?>
<div class="container mt-3">
    <a href="/department/create" class="btn btn-primary">Add New</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Department</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($department as $index => $department): ?>
                <tr>
                    <td><?= $index + 1 ?></td>
                    <td><?= $department['name'] ?></td>
                    <td><?= $department['description'] ?></td>
                    <td>
                        <a href="/department/edit?id=<?= $department['id'] ?>" class="btn btn-warning">Edit</a> |
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#department<?= $department['id'] ?>">
                            delete
                        </button>
                        <?php require 'delete.php' ?>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>