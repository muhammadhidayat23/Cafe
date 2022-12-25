<!-- Hero/Header -->
<?php foreach ($storys as $story) : ?>
    <section class="hero-story">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-12 d-flex align-items-center">
                    <div class="content">

                        <h1><?= $story->title ?></h1>
                        <p>
                            <?= $story->sub_title ?>
                        </p>
                    </div>
                </div>
                <div class="col-md-6 d-flex align-items-center">
                    <div class="image-header" data-aos="fade-left">
                        <img src="<?= base_url() . '/upload/hero/' . $story->hero_img ?>" alt="" width="70%">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Story Section -->

    <section class="story">
        <div class="container">
            <div class="row">
                <div class="col-md-7 d-flex align-items-center" data-aos="fade-up">
                    <div class="story-title">
                        <h1><?= $story->title_2 ?></h1>
                        <p><?= $story->deskripsi_2 ?></p>
                    </div>
                </div>
                <div class="col-md-5" data-aos="fade-up">
                    <div class="image-story d-flex align-items-center justify-content-end">
                        <img src="<?= base_url() . '/upload/hero/' . $story->hero_img_2 ?>" width="90%" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Story#2 Section -->

    <section class="our-backgrounds">
        <div class="container">
            <div class="row">
                <div class="col-md-5" data-aos="fade-up">
                    <div class="image-locations d-sm-none d-md-block d-flex align-items-center">
                        <img src="<?= base_url() . '/upload/hero/' . $story->hero_img_3 ?>" width="90%" alt="">
                    </div>
                </div>
                <div class="col-md-7 d-flex align-items-center" data-aos="fade-up">
                    <div class="locations-title">
                        <h1><?= $story->title_3 ?></h1>
                        <p><?= $story->deskripsi_3 ?></p>
                    </div>
                </div>

            </div>
        </div>
    </section>
<?php endforeach ?>