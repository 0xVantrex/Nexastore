<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="container padding-large" style="margin-top: 100px;">

    <div class="row pb-4">
        <div class="col-12">
            <h2 class="text-uppercase text-dark">Welcome, <?= esc(session()->get('name')) ?></h2>
            <p class="text-muted">You are logged in as <strong><?= esc(session()->get('role')) ?></strong></p>
        </div>
    </div>

    <?php if (session()->get('role') === 'admin'): ?>
    <!-- ADMIN DASHBOARD -->
    <div class="row pb-4">
        <div class="col-md-4 pb-3">
            <div class="card border-0 shadow-sm p-4 text-center">
                <h1 class="text-dark"><?= $total_users ?? 0 ?></h1>
                <p class="text-uppercase text-muted mb-0">Total Users</p>
            </div>
        </div>
        <div class="col-md-4 pb-3">
            <div class="card border-0 shadow-sm p-4 text-center">
                <h1 class="text-dark"><?= $total_products ?? 0 ?></h1>
                <p class="text-uppercase text-muted mb-0">Total Products</p>
            </div>
        </div>
        <div class="col-md-4 pb-3">
            <div class="card border-0 shadow-sm p-4 text-center">
                <h1 class="text-dark"><?= $total_orders ?? 0 ?></h1>
                <p class="text-uppercase text-muted mb-0">Total Orders</p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card border-0 shadow-sm p-4">
                <div class="d-flex justify-content-between pb-3">
                    <h5 class="text-uppercase">Recent Orders</h5>
                    <a href="/admin/orders" class="btn btn-dark btn-medium text-uppercase btn-rounded-none">View All</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-borderless">
                        <thead class="text-uppercase text-muted">
                            <tr>
                                <th>#</th>
                                <th>Customer</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($recent_orders)): ?>
                                <?php foreach (array_slice($recent_orders, 0, 5) as $order): ?>
                                    <tr>
                                        <td><?= $order['id'] ?></td>
                                        <td><?= esc($order['user_name']) ?></td>
                                        <td>$<?= number_format($order['total'], 2) ?></td>
                                        <td>
                                            <span class="badge bg-<?= $order['status'] === 'delivered' ? 'success' : ($order['status'] === 'cancelled' ? 'danger' : 'warning') ?>">
                                                <?= ucfirst($order['status']) ?>
                                            </span>
                                        </td>
                                        <td><?= date('M d, Y', strtotime($order['created_at'])) ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr><td colspan="5" class="text-center text-muted">No orders yet.</td></tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row pt-4">
        <div class="col-12 d-flex gap-3">
            <a href="/admin/users" class="btn btn-dark text-uppercase btn-rounded-none">Manage Users</a>
            <a href="/admin/orders" class="btn btn-dark text-uppercase btn-rounded-none">Manage Orders</a>
            <a href="/products/create" class="btn btn-dark text-uppercase btn-rounded-none">Add Product</a>
        </div>
    </div>

    <?php elseif (session()->get('role') === 'editor'): ?>
    <!-- EDITOR DASHBOARD -->
    <div class="row pb-4">
        <div class="col-md-4 pb-3">
            <div class="card border-0 shadow-sm p-4 text-center">
                <h1 class="text-dark"><?= $total_products ?? 0 ?></h1>
                <p class="text-uppercase text-muted mb-0">Total Products</p>
            </div>
        </div>
        <div class="col-md-4 pb-3">
            <div class="card border-0 shadow-sm p-4 text-center">
                <h1 class="text-dark"><?= count($my_products ?? []) ?></h1>
                <p class="text-uppercase text-muted mb-0">My Products</p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card border-0 shadow-sm p-4">
                <div class="d-flex justify-content-between pb-3">
                    <h5 class="text-uppercase">My Products</h5>
                    <a href="/products/create" class="btn btn-dark btn-medium text-uppercase btn-rounded-none">Add Product</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-borderless">
                        <thead class="text-uppercase text-muted">
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Stock</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($my_products)): ?>
                                <?php foreach ($my_products as $product): ?>
                                    <tr>
                                        <td><?= $product['id'] ?></td>
                                        <td><?= esc($product['name']) ?></td>
                                        <td>$<?= number_format($product['price'], 2) ?></td>
                                        <td><?= $product['stock'] ?></td>
                                        <td>
                                            <a href="/products/edit/<?= $product['id'] ?>" class="btn btn-sm btn-dark text-uppercase">Edit</a>
                                            <a href="/products/delete/<?= $product['id'] ?>" class="btn btn-sm btn-outline-dark text-uppercase" onclick="return confirm('Delete this product?')">Delete</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr><td colspan="5" class="text-center text-muted">No products added yet.</td></tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <?php else: ?>
    <!-- USER DASHBOARD -->
    <div class="row">
        <div class="col-12">
            <div class="card border-0 shadow-sm p-4">
                <div class="d-flex justify-content-between pb-3">
                    <h5 class="text-uppercase">My Orders</h5>
                    <a href="/products" class="btn btn-dark btn-medium text-uppercase btn-rounded-none">Shop Now</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-borderless">
                        <thead class="text-uppercase text-muted">
                            <tr>
                                <th>#</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($my_orders)): ?>
                                <?php foreach ($my_orders as $order): ?>
                                    <tr>
                                        <td><?= $order['id'] ?></td>
                                        <td>$<?= number_format($order['total'], 2) ?></td>
                                        <td>
                                            <span class="badge bg-<?= $order['status'] === 'delivered' ? 'success' : ($order['status'] === 'cancelled' ? 'danger' : 'warning') ?>">
                                                <?= ucfirst($order['status']) ?>
                                            </span>
                                        </td>
                                        <td><?= date('M d, Y', strtotime($order['created_at'])) ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr><td colspan="4" class="text-center text-muted">No orders yet. <a href="/products">Start shopping!</a></td></tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>

</div>

<?= $this->endSection() ?>