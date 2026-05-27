<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="container padding-large" style="margin-top: 100px;">

    <div class="row pb-4">
        <div class="display-header d-flex justify-content-between pb-3">
            <h2 class="display-7 text-dark text-uppercase">Our Collection</h2>
            <?php if (session()->get('role') === 'admin' || session()->get('role') === 'editor'): ?>
                <a href="/products/create" class="btn btn-dark btn-medium text-uppercase btn-rounded-none">Add Product</a>
            <?php endif; ?>
        </div>

        <!-- Search Bar -->
        <form method="get" action="/products" class="pb-4">
            <div class="input-group">
                <input type="text" name="q" class="form-control btn-rounded-none" placeholder="Search watches..." value="<?= esc(service('request')->getGet('q') ?? '') ?>">
                <button class="btn btn-dark text-uppercase btn-rounded-none" type="submit">Search</button>
            </div>
        </form>
    </div>

    <div class="row">
        <?php if (!empty($products)): ?>
            <?php foreach ($products as $product): ?>
                <div class="col-lg-3 col-md-4 col-sm-6 pb-4">
                    <div class="product-card position-relative">
                        <div class="image-holder">
                            <?php if ($product['image']): ?>
                                <img src="/uploads/<?= esc($product['image']) ?>" alt="<?= esc($product['name']) ?>" class="img-fluid">
                            <?php else: ?>
                                <img src="/images/product-item1.jpg" alt="<?= esc($product['name']) ?>" class="img-fluid">
                            <?php endif; ?>
                        </div>
                        <div class="cart-concern position-absolute">
                            <div class="cart-button d-flex">
                                <a href="/products/<?= $product['id'] ?>" class="btn btn-medium btn-black">
                                    View <svg class="cart-outline"><use xlink:href="#cart-outline"></use></svg>
                                </a>
                            </div>
                        </div>
                        <div class="card-detail d-flex justify-content-between align-items-baseline pt-3">
                            <h3 class="card-title text-uppercase">
                                <a href="/products/<?= $product['id'] ?>"><?= esc($product['name']) ?></a>
                            </h3>
                            <span class="item-price text-primary">$<?= number_format($product['price'], 2) ?></span>
                        </div>
                        <p class="text-muted small">Stock: <?= $product['stock'] ?></p>
                        <?php if (session()->get('role') === 'admin' || session()->get('role') === 'editor'): ?>
                            <div class="d-flex gap-2 pt-1">
                                <a href="/products/edit/<?= $product['id'] ?>" class="btn btn-sm btn-dark text-uppercase btn-rounded-none">Edit</a>
                                <a href="/products/delete/<?= $product['id'] ?>" class="btn btn-sm btn-outline-dark text-uppercase btn-rounded-none" onclick="return confirm('Delete this product?')">Delete</a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="col-12 text-center py-5">
                <h4 class="text-muted text-uppercase">No products found.</h4>
                <?php if (session()->get('role') === 'admin' || session()->get('role') === 'editor'): ?>
                    <a href="/products/create" class="btn btn-dark mt-3 text-uppercase btn-rounded-none">Add First Product</a>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>

</div>

<?= $this->endSection() ?>