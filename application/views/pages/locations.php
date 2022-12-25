    <!-- Hero/Header -->

    <?php foreach ($setups as $setup) : ?>
        <section class="hero-story">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-12 d-flex align-items-center">
                        <div class="content">
                            <h1><?= $setup->title_1 ?></h1>
                            <p>
                                <?= $setup->deskripsi_1 ?>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6 d-flex align-items-center">
                        <div class="image-header" data-aos="fade-left">
                            <img src="<?= base_url() . '/upload/hero/' . $setup->hero_img_1 ?>" alt="" width="70%">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Loation Section -->

        <section class="locations">
            <div class="container">
                <div class="row">
                    <div class="col-md-5" data-aos="fade-up">
                        <div class="image-locations d-flex align-items-center">
                            <img src="<?= base_url() . '/upload/hero/' . $setup->hero_img_2 ?>" width="90%" alt="">
                        </div>
                    </div>
                    <div class="col-md-7 d-flex align-items-center" data-aos="fade-up">
                        <div class="locations-title">
                            <p><?= $setup->deskripsi_2 ?></p>
                            <button class="main-btn"><a href="<?= $setup->link_alamat ?>" target="_blank" rel="noopener noreferrer">google maps</a>
                                <img src="<?= base_url() ?>./assets/images/arrow-right.svg" style="margin-left: 10px;" alt="">
                            </button>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    <?php endforeach ?>