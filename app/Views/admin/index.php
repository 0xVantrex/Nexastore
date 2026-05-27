<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="container padding-large" style="margin-top: 100px;">

    <div class="row pb-4">
        <div class="col-12">
            <h2 class="text-uppercase text-dark">Admin Panel</h2>
            <p class="text-muted">Manage your store from here.</p>
        </div>
    </div>

    <!-- Stats -->
    <div class="row pb-4">
        <div class="col-md-4 pb-3">
            <div class="card border-0 shadow-sm p-4 text-center">
                <h1 class="text-dark"><?= $total_users ?? 0 ?></h1>
                <p class="text-uppercase text-muted mb-0">Total Users</p>
                <a href="/admin/users" class="btn btn-dark btn-medium text-uppercase btn-rounded-none mt-3">Manage</a>
            </div>
        </div>
        <div class="col-md-4 pb-3">
            <div class="card border-0 shadow-sm p-4 text-center">
                <h1 class="text-dark"><?= $total_products ?? 0 ?></h1>
                <p class="text-uppercase text-muted mb-0">Total Products</p>
                <a href="/products/create" class="btn btn-dark btn-medium text-uppercase btn-rounded-none mt-3">Add New</a>
            </div>
        </div>
        <div class="col-md-4 pb-3">
            <div class="card border-0 shadow-sm p-4 text-center">
                <h1 class="text-dark"><?= $total_orders ?? 0 ?></h1>
                <p class="text-uppercase text-muted mb-0">Total Orders</p>
                <a href="/admin/orders" class="btn btn-dark btn-medium text-uppercase btn-rounded-none mt-3">Manage</a>
            </div>
        </div>
    </div>

    <!-- Recent Orders -->
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
                                <th>Email</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($recent_orders)): ?>
                                <?php foreach (array_slice($recent_orders, 0, 8) as $order): ?>
                                    <tr>
                                        <td><?= $order['id'] ?></td>
                                        <td><?= esc($order['user_name']) ?></td>
                                        <td><?= esc($order['user_email']) ?></td>
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
                                <tr><td colspan="6" class="text-center text-muted">No orders yet.</td></tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>

<?= $this->endSection() ?>