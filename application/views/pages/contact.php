<!-- Hero/Header -->

<section class="hero-story">
    <div class="container">
        <div class="row">
            <?php foreach ($contact as $ct) : ?>
                <div class="col-md-6 col-sm-12 d-flex align-items-center">
                    <div class="content">
                        <h1><?= $ct->title ?></h1>
                        <p>
                            <?= $ct->deskripsi ?>
                        </p>
                    </div>
                </div>
                <div class="col-md-6 d-flex align-items-center">
                    <div class="image-header" data-aos="fade-left">
                        <img src="<?= base_url('/upload/hero/' . $ct->hero_img_1) ?>" alt="" width="70%">
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</section>

<!-- Message Section -->

<section class="message">
    <div class="container">
        <div class="row">
            <?php foreach ($contact as $ct) : ?>
                <div class="col-md-5" data-aos="fade-up">
                    <div class="image-locations d-sm-none d-md-block d-flex align-items-center justify-content-end">
                        <img src="<?= base_url('/upload/hero/' . $ct->hero_img_2) ?>" width="90%" alt="">
                    </div>
                </div>
            <?php endforeach ?>
            <div class="col-md-7 d-flex align-items-center">
                <div class="mesage-area">
                    <form action="" class="row" method="post">
                        <div class="title-message pb-2">
                            <h2>Say Hello</h2>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <label class="form-label">Name</label>
                            <input type="text" name="nama" class="form-control" class="<?= form_error('nama') ? 'invalid' : '' ?>" placeholder="Nama" value="<?= set_value('nama') ?>" required>
                            <div class="invalid-feedback"><?= form_error('nama') ?></div>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" class="<?= form_error('email') ? 'invalid' : '' ?>" placeholder="Email" value="<?= set_value('email') ?>" required>
                            <div class="invalid-feedback"><?= form_error('email') ?></div>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="textarea-message">
                            <label class="form-label">Message</label>
                            <textarea class="form-control" name="pesan" class="form-control" rows="8" class="<?= form_error('pesan') ? 'invalid' : '' ?>" placeholder="Pesan" required><?= set_value('pesan') ?></textarea>
                            <div class="invalid-feedback"><?= form_error('pesan') ?></div>
                        </div>
                        <div class="col-12 d-flex justify-content-end">
                            <button class="main-btn" type="submit">send message</a>
                                <img src="<?= base_url() ?>./assets/images/arrow-right.svg" style="margin-left: 10px;" alt="">
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</section>