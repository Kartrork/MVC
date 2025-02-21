<?php require_once "./views/layout/header.php" ?>
<div class="container">
    <form action="/user/update?id=<?= $user['id'] ?>" method="POST">
        <div class="form-group">
            <label for="" class="form-label">Name:</label>
            <input type="text" value=" <?= $user['name'] ?>" name="name" class="form-control">
        </div>
        <button type="submit" class="btn btn-success mt-3">Update</button>
    </form>
</div>
<?php require_once './views/layout/footer.php' ?>