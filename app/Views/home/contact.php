<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="container padding-large" style="margin-top: 100px;">

    <div class="row pb-4">
        <div class="col-12">
            <h2 class="display-7 text-uppercase text-dark">Contact Us</h2>
            <p class="text-muted">We'd love to hear from you. Get in touch with us.</p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 pb-5">
            <div class="card border-0 shadow-sm p-4">
                <h4 class="text-uppercase pb-3">Send a Message</h4>
                <form action="/contact" method="POST">
                    <?= csrf_field() ?>
                    <div class="mb-3">
                        <label class="form-label text-uppercase">Full Name</label>
                        <input type="text" name="name" class="form-control btn-rounded-none" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label text-uppercase">Email</label>
                        <input type="email" name="email" class="form-control btn-rounded-none" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label text-uppercase">Subject</label>
                        <input type="text" name="subject" class="form-control btn-rounded-none" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label text-uppercase">Message</label>
                        <textarea name="message" class="form-control btn-rounded-none" rows="5" required></textarea>
                    </div>
                    <div class="d-grid mt-4">
                        <button type="submit" class="btn btn-dark btn-medium text-uppercase btn-rounded-none">Send Message</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="col-md-6 pb-5 ps-md-5">
            <h4 class="text-uppercase pb-3">Get In Touch</h4>
            <div class="icon-box d-flex pb-4">
                <div class="icon-box-icon pe-3">
                    <svg class="shield-plus"><use xlink:href="#shield-plus" /></svg>
                </div>
                <div class="icon-box-content">
                    <h3 class="card-title text-uppercase text-dark">Address</h3>
                    <p class="text-muted">123 Watch Street, Nairobi, Kenya</p>
                </div>
            </div>
            <div class="icon-box d-flex pb-4">
                <div class="icon-box-icon pe-3">
                    <svg class="price-tag"><use xlink:href="#price-tag" /></svg>
                </div>
                <div class="icon-box-content">
                    <h3 class="card-title text-uppercase text-dark">Email</h3>
                    <p class="text-muted">info@nexastore.com</p>
                </div>
            </div>
            <div class="icon-box d-flex pb-4">
                <div class="icon-box-icon pe-3">
                    <svg class="cart-outline"><use xlink:href="#cart-outline" /></svg>
                </div>
                <div class="icon-box-content">
                    <h3 class="card-title text-uppercase text-dark">Phone</h3>
                    <p class="text-muted">+254 712 345 678</p>
                </div>
            </div>
            <div class="icon-box d-flex pb-4">
                <div class="icon-box-icon pe-3">
                    <svg class="quality"><use xlink:href="#quality" /></svg>
                </div>
                <div class="icon-box-content">
                    <h3 class="card-title text-uppercase text-dark">Working Hours</h3>
                    <p class="text-muted">Mon - Sat: 9:00am - 6:00pm</p>
                </div>
            </div>
        </div>
    </div>

</div>

<?= $this->endSection() ?>