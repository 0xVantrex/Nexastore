<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="container padding-large" style="margin-top: 100px;">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card border-0 shadow-sm p-4">
                <div class="d-flex justify-content-between pb-3">
                    <h2 class="text-uppercase text-dark">Add Product</h2>
                    <a href="/products" class="btn btn-medium btn-normal text-uppercase btn-rounded-none">Back</a>
                </div>
                <form action="/products/create" method="POST" enctype="multipart/form-data">
                    <?= csrf_field() ?>
                    <div class="mb-3">
                        <label class="form-label text-uppercase">Product Name</label>
                        <input type="text" name="name" class="form-control btn-rounded-none" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label text-uppercase">Description</label>
                        <textarea name="description" class="form-control btn-rounded-none" rows="4"></textarea>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label text-uppercase">Price ($)</label>
                            <input type="number" name="price" class="form-control btn-rounded-none" step="0.01" min="0" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label text-uppercase">Stock</label>
                            <input type="number" name="stock" class="form-control btn-rounded-none" min="0" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label text-uppercase">Product Image</label>
                        <input type="file" name="image" class="form-control btn-rounded-none" accept="image/*">
                    </div>
                    <div class="d-grid mt-4">
                        <button type="submit" class="btn btn-dark btn-medium text-uppercase btn-rounded-none">Add Product</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>