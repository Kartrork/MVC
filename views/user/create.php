<?php require_once "./views/layout/header.php" ?>
<div class="main-panel">
    <!-- Navbar -->
    <div class="col-md-12">
        <div class="card card-user">
            <div class="card-header">
                <h5 class="card-title">Add New User</h5>
            </div>
            <div class="container">
                <form action="/user/store" method="POST">
                    <div class="form-group">
                        <label for="" class="form-label">Name:</label>
                        <input type="text" value="" name="name" class="form-control">
                    </div>
                    <div class="file-image">
                        <input type="file" name="image" id="image" accept="image/*"> <br>
                    </div>
                    <button type="submit" class="btn btn-success mt-3">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php require_once "./views/layout/footer.php" ?>