<?php require_once 'views/layout/header.php' ?>
<div class="container">
    <form action="/employee/store" method="POST">
        <div class="form-group">
            <label for="name" class="form-label">Name:</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="email" class="form-label">Email:</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="phone" class="form-label">Phone Number:</label>
            <input type="number" name="phone" class="form-control">
        </div>
        <div class="form-group">
            <label for="id" class="form-label">Employee:</label>
            <select name="id" class="form-control" required>
                <option value="">Select Employee</option>
                <?php foreach ($department as $departmen): ?>
                    <option value="<?= $departmen['id'] ?>"><?= $departmen['name'] ?></option>
                <?php endforeach ?>
            </select>
        </div>
        <div class="form-group">
            <label for="description" class="form-label">Description:</label>
            <textarea name="description" class="form-control" required></textarea>
        </div>
        <button type="submit" class="btn btn-success mt-3">Submit</button>
    </form>
</div>
<?php require_once 'views/layout/footer.php' ?>