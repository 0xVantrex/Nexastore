<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="container padding-large" style="margin-top: 100px;">

    <div class="row pb-4">
        <div class="col-12 d-flex justify-content-between align-items-center">
            <h2 class="text-uppercase text-dark">Manage Users</h2>
            <a href="/admin" class="btn btn-medium btn-normal text-uppercase btn-rounded-none">Back to Admin</a>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card border-0 shadow-sm p-4">
                <div class="table-responsive">
                    <table class="table table-borderless">
                        <thead class="text-uppercase text-muted">
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Joined</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($users)): ?>
                                <?php foreach ($users as $user): ?>
                                    <tr>
                                        <td><?= $user['id'] ?></td>
                                        <td><?= esc($user['name']) ?></td>
                                        <td><?= esc($user['email']) ?></td>
                                        <td>
                                            <span class="badge bg-<?= $user['role'] === 'admin' ? 'danger' : ($user['role'] === 'editor' ? 'warning' : 'primary') ?>">
                                                <?= ucfirst($user['role']) ?>
                                            </span>
                                        </td>
                                        <td><?= date('M d, Y', strtotime($user['created_at'])) ?></td>
                                        <td>
                                            <?php if ($user['id'] !== session()->get('user_id')): ?>
                                                <a href="/admin/users/delete/<?= $user['id'] ?>" class="btn btn-sm btn-outline-dark text-uppercase btn-rounded-none" onclick="return confirm('Delete this user?')">Delete</a>
                                            <?php else: ?>
                                                <span class="text-muted small">You</span>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr><td colspan="6" class="text-center text-muted">No users found.</td></tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>

<?= $this->endSection() ?>