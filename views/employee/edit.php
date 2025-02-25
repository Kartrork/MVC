<?php require_once 'views/layout/header.php' ?>
<div class="container">
    <form action="/employee/update?id=<?= $employee['employee_id'] ?>" method="POST">
        <div class="form-group">
            <label for="name" class="form-label">Name:</label>
            <input type="text" name="name" class="form-control" value="<?= $employee['name'] ?>">
        </div>
        <div class="form-group">
            <label for="email" class="form-label">Email:</label>
            <input type="email" name="email" class="form-control" value="<?= $employee['email'] ?>">
        </div>
        <div class="form-group">
            <label for="number" class="form-label">:</label>
            <input type="number" name="number" class="form-control" value="<?= $employee['phone'] ?>">
        </div>
        <div class="form-group">
            <label for="category_id" class="form-label">Department:</label>
            <select name="category_id" class="form-control">
                <option value="">Select Employee</option>
                <?php foreach ($department as $department): ?>
                    <option value="<?= $department['id'] ?>" <?= $department['category_id'] == $department['id'] ? 'selected' : '' ?>>
                        <?= $department['name'] ?>
                    </option>
                <?php endforeach ?>
            </select>
        </div>
        <div class="form-group">
            <label for="description" class="form-label">Description:</label>
            <textarea name="description" class="form-control"><?= $employee['description'] ?></textarea>
        </div>
        <button type="submit" class="btn btn-success mt-3">Update</button>
    </form>
</div>
<?php require_once 'views/layout/footer.php' ?>