<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="container padding-large" style="margin-top: 100px;">

    <div class="row pb-5">
        <div class="col-12">
            <h2 class="display-7 text-uppercase text-dark">About NexaStore</h2>
            <p class="text-muted">Your premier destination for luxury timepieces.</p>
        </div>
    </div>

    <div class="row pb-5">
        <div class="col-md-6 pb-4">
            <img src="/images/single-image2.jpg" alt="about" class="img-fluid">
        </div>
        <div class="col-md-6 d-flex align-items-center">
            <div>
                <h3 class="text-uppercase text-dark pb-3">Our Story</h3>
                <p>NexaStore was founded with a simple passion — bringing the finest watches from around the world to your wrist. We believe a watch is more than just a timepiece. It is a statement, a memory, and a companion for life.</p>
                <p>From classic dress watches to rugged sports watches and cutting-edge smartwatches, our collection is carefully curated to suit every style and occasion.</p>
                <a href="/products" class="btn btn-dark btn-medium text-uppercase btn-rounded-none mt-3">Shop Collection</a>
            </div>
        </div>
    </div>

    <div class="row pb-5">
        <div class="col-md-6 d-flex align-items-center pb-4">
            <div>
                <h3 class="text-uppercase text-dark pb-3">Why Choose Us</h3>
                <p>We stock only authentic, verified timepieces from the world's most respected brands. Every watch goes through a rigorous quality check before it reaches you.</p>
                <p>Our team of watch enthusiasts is always on hand to help you find the perfect piece for any occasion or budget.</p>
            </div>
        </div>
        <div class="col-md-6 pb-4">
            <img src="/images/single-image3.jpg" alt="about" class="img-fluid">
        </div>
    </div>

    <!-- Services -->
    <div class="row padding-large no-padding-top">
        <div class="col-12 pb-4">
            <h3 class="text-uppercase text-dark">What We Offer</h3>
        </div>
        <div class="col-lg-3 col-md-6 pb-3">
            <div class="icon-box d-flex">
                <div class="icon-box-icon pe-3 pb-3">
                    <svg class="cart-outline"><use xlink:href="#cart-outline" /></svg>
                </div>
                <div class="icon-box-content">
                    <h3 class="card-title text-uppercase text-dark">Free Delivery</h3>
                    <p>On all orders over $50 worldwide.</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 pb-3">
            <div class="icon-box d-flex">
                <div class="icon-box-icon pe-3 pb-3">
                    <svg class="quality"><use xlink:href="#quality" /></svg>
                </div>
                <div class="icon-box-content">
                    <h3 class="card-title text-uppercase text-dark">Authenticity</h3>
                    <p>100% genuine watches guaranteed.</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 pb-3">
            <div class="icon-box d-flex">
                <div class="icon-box-icon pe-3 pb-3">
                    <svg class="price-tag"><use xlink:href="#price-tag" /></svg>
                </div>
                <div class="icon-box-content">
                    <h3 class="card-title text-uppercase text-dark">Best Prices</h3>
                    <p>Competitive pricing on every piece.</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 pb-3">
            <div class="icon-box d-flex">
                <div class="icon-box-icon pe-3 pb-3">
                    <svg class="shield-plus"><use xlink:href="#shield-plus" /></svg>
                </div>
                <div class="icon-box-content">
                    <h3 class="card-title text-uppercase text-dark">Secure Payment</h3>
                    <p>Safe and encrypted transactions.</p>
                </div>
            </div>
        </div>
    </div>

</div>

<?= $this->endSection() ?>