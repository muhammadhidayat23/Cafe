<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Main CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>./assets/css/main.css">

    <!-- AOS CSS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <title><?= isset($meta['title']) ? $meta['title'] : 'Seduhan Rindu' ?></title>
</head>

<body>

    <!-- Navbar Section -->

    <nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="<?= site_url('home') ?>"><img src="<?= base_url() ?>./assets/images/logo.svg" alt=""></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav mx-auto">

                    <a class="<?php if ($this->uri->uri_string() == 'home') {
                                    echo 'active';
                                } ?> nav-link" aria-current="page" href="<?= site_url('home') ?>">Home</a>
                    <a class="<?php if ($this->uri->uri_string() == 'home/story') {
                                    echo 'active';
                                } ?> nav-link" href="<?= site_url('home/story') ?>">Story</a>
                    <a class="<?php if ($this->uri->uri_string() == 'home/menu') {
                                    echo 'active';
                                } ?> nav-link" href="<?= site_url('home/menu') ?>">Menu</a>
                    <a class="<?php if ($this->uri->uri_string() == 'home/locations') {
                                    echo 'active';
                                } ?> nav-link" href="<?= site_url('home/locations') ?>">Locations</a>
                    <a class="<?php if ($this->uri->uri_string() == 'home/merchandise') {
                                    echo 'active';
                                } ?> nav-link" href="<?= site_url('home/merchandise') ?>">Merchandise</a>
                    <a class="<?php if ($this->uri->uri_string() == 'home/contact') {
                                    echo 'active';
                                } ?> nav-link" href="<?= site_url('home/contact') ?>">Contacts</a>
                </div>
                <div class="social-icons d-flex justify-content-center">
                    <div class="social">
                        <a class="navbar-social" href="https://www.instagram.com/seduhanrindu19/" target="_blank" rel="noopener noreferrer"><img src="<?= base_url() ?>./assets/images/social-media.svg" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <?php echo $contents ?>

    <!-- Footer -->

    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="logo-footer">
                        <img src="<?= base_url() ?>./assets/images/logo-footer.png" alt="">
                    </div>
                </div>
                <div class="col-md-9 col-sm-6">
                    <div class="nav-menu">
                        <div class="row">
                            <div class="col-md-4 ">
                                <div class="link-list">
                                    <div class="content">
                                        <h4>link</h4>
                                        <div class="link-list">
                                            <div class="row">
                                                <div class="col pe-5">
                                                    <ul class="list">
                                                        <li class="link"><a href="<?= site_url('home') ?>">Home</a></li>
                                                        <li class="link"><a href="<?= site_url('home/story') ?>">Story</a></li>
                                                        <li class="link"><a href="<?= site_url('home/menu') ?>">Menu</a></li>
                                                    </ul>
                                                </div>
                                                <div class="col">
                                                    <ul class="list">
                                                        <li class="link"><a href="<?= site_url('home/locations') ?>">Location</a></li>
                                                        <li class="link"><a href="<?= site_url('home/merchandise') ?>">Merchandise</a></li>
                                                        <li class="link"><a href="<?= site_url('home/contact') ?>">Contact</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="content-contact">
                                    <h4>Contact</h4>
                                    <ul class="List">
                                        <li class="link"><a href="#">seduhanrindu@gmail.com</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="content-social">
                                    <h4>Social</h4>
                                    <ul class="list">
                                        <li class="link">
                                            <a href="https://www.instagram.com/seduhanrindu19/" target="_blank" rel="noopener noreferrer"><img src="<?= base_url() ?>./assets/images/social-media-footer.svg" s alt=""> seduhanrindu19</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--  Bootstrap Javascript -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

    <!-- AOS Javascript -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 1000,
        });
    </script>

</body>

</html>