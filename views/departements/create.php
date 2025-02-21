<?php require_once "./views/layout/header.php" ?>
<div class="container">
    <form action="/department/store" method="POST">
        <div class="form-group">
            <label for="" class="form-label">Name:</label>
            <input type="text" value="" name="name" class="form-control">
            <label for="" class="form-label">Description:</label>
            <input type="text" value="" name="description" class="form-control">
        </div>
        <button type="submit" class="btn btn-success mt-3">Submit</button>
    </form>
</div>
<?php require_once "./views/layout/footer.php" ?>