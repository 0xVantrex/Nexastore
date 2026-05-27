<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="container padding-large" style="margin-top: 100px;">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card border-0 shadow-sm p-4">
                <h2 class="text-uppercase text-center pb-3">Login</h2>
                <form action="/login" method="POST">
                    <?= csrf_field() ?>
                    <div class="mb-3">
                        <label class="form-label text-uppercase">Email</label>
                        <input type="email" name="email" class="form-control btn-rounded-none" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label text-uppercase">Password</label>
                        <input type="password" name="password" class="form-control btn-rounded-none" required>
                    </div>
                    <div class="d-grid mt-4">
                        <button type="submit" class="btn btn-dark btn-medium text-uppercase btn-rounded-none">Login</button>
                    </div>
                    <p class="text-center mt-3">Don't have an account? <a href="/register">Register</a></p>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>