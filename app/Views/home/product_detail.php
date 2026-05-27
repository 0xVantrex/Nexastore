<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="container padding-large" style="margin-top: 100px;">
    <div class="row">
        <div class="col-md-6 pb-4">
            <div class="image-holder">
                <?php if ($product['image']): ?>
                    <img src="/uploads/<?= esc($product['image']) ?>" alt="<?= esc($product['name']) ?>" class="img-fluid">
                <?php else: ?>
                    <img src="/images/singel-product-item.jpg" alt="<?= esc($product['name']) ?>" class="img-fluid">
                <?php endif; ?>
            </div>
        </div>
        <div class="col-md-6 pb-4">
            <div class="product-detail ps-md-4">
                <h2 class="text-uppercase text-dark"><?= esc($product['name']) ?></h2>
                <h3 class="item-price text-primary pb-3">$<?= number_format($product['price'], 2) ?></h3>
                <p class="text-muted"><?= esc($product['description']) ?></p>
                <p class="text-uppercase"><strong>Stock:</strong>
                    <?php if ($product['stock'] > 0): ?>
                        <span class="text-success"><?= $product['stock'] ?> available</span>
                    <?php else: ?>
                        <span class="text-danger">Out of stock</span>
                    <?php endif; ?>
                </p>
                <hr>
                <div class="d-flex gap-3 pt-3">
                    <?php if ($product['stock'] > 0): ?>
                        <a href="#" class="btn btn-dark btn-medium text-uppercase btn-rounded-none">
                            Add to Cart <svg class="cart-outline"><use xlink:href="#cart-outline"></use></svg>
                        </a>
                    <?php endif; ?>
                    <a href="/products" class="btn btn-medium btn-normal text-uppercase btn-rounded-none">Back to Shop</a>
                </div>
                <?php if (session()->get('role') === 'admin' || session()->get('role') === 'editor'): ?>
                    <div class="d-flex gap-3 pt-3">
                        <a href="/products/edit/<?= $product['id'] ?>" class="btn btn-sm btn-dark text-uppercase btn-rounded-none">Edit Product</a>
                        <a href="/products/delete/<?= $product['id'] ?>" class="btn btn-sm btn-outline-dark text-uppercase btn-rounded-none" onclick="return confirm('Delete this product?')">Delete</a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>