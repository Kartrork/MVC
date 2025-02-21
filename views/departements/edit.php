<?php require_once "./views/layout/header.php" ?>
<div class="container">
    <form action="/department/update?id=<?= $department['id'] ?>" method="POST">
        <div class="form-group">
            <label for="" class="form-label">Name:</label>
            <input type="text" value=" <?= $department['name'] ?>" name="name" class="form-control">
            <label for="" class="form-label">Description:</label>
            <input type="text" value=" <?= $department['description'] ?>" name="description" class="form-control">
        </div>
        <button type="submit" class="btn btn-success mt-3">Update</button>
    </form>
</div>
<?php require_once './views/layout/footer.php' ?>