<!-- Hero/Header -->
<section class="hero">
    <div class="container">
        <div class="row">
            <?php foreach ($heros as $hero) : ?>
                <div class="col-md-6 col-sm-12 d-flex align-items-center">
                    <div class="content">
                        <h1><?= $hero->title ?></h1>
                        <p>
                            <?= $hero->deskripsi ?>
                        </p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="image-header" data-aos="fade-left">
                        <img src="<?= base_url() . '/upload/hero/' . $hero->hero_img ?>" alt="" width="95%">
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</section>

<!-- merchandise -->

<section class="merchandise">
    <div class="container">
        <div class="title-merchandise">
            <h1>merchandise</h1>
        </div>
        <div class="card-merchandise">
            <div class="row">
                <?php foreach ($merchandises as $merchandise) : ?>
                    <div class="col-md-6" data-aos="fade-up">
                        <div class="card-content">
                            <div class="card d-flex justify-content-center">
                                <img src="<?= base_url() . '/upload/merchandise/' . $merchandise->foto ?>" width="100%" class="card-img-top" alt="">
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </div>
</section>