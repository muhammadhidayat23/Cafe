<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!-- Hero/Header -->
<section class="hero">
    <div class="container">
        <div class="row">
            <?php foreach ($setups as $setup) : ?>
                <div class="col-md-6 col-sm-12 d-flex align-items-center">
                    <div class="content">
                        <h1><?= $setup->title ?></h1>
                        <p>
                            <?= $setup->sub_title ?>
                        </p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="image-header" data-aos="fade-left">
                        <img src="<?= base_url() . '/upload/hero/' . $setup->hero_img ?>" alt="" width="95%">
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</section>

<!-- product -->

<section class="product">
    <div class="container">
        <div class="title-product" data-aos="fade-up">
            <h1>product</h1>
        </div>
        <div class="category-product">
            <div class="list-product d-flex justify-content-center">
                <div class="list-group list-group-horizontal">
                    <div class="row" data-aos="fade-up">
                        <div class="col-12 text-center pb-4">
                            <a class="active category-item" href="<?= base_url('home/menu/') ?>">All</a>
                            <?php foreach ($kategori as $data) : ?>
                                <a href="<?= base_url('home/kategori/') . $data->id_kategori ?>" class="<?php if ($this->uri->uri_string() == 'home/kategori/') {
                                                                                                            echo 'active';
                                                                                                        } ?> category-item"><?= $data->nama_kategori ?></a>
                            <?php endforeach ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card-product" id="product">
        <div class="row">
            <?php foreach ($products as $product) : ?>
                <div class="col-12 col-sm-6 col-md-6 col-lg-4 pb-4" data-aos="fade-up">
                    <div class="card">
                        <div class="flip">
                            <div class="card-front">
                                <img src="<?= base_url() . '/upload/product/' . $product->foto ?>" alt="">
                            </div>
                            <div class="card-back">
                                <div class="content-back">
                                    <h2 class="title">
                                        description
                                    </h2>
                                    <p>
                                        <?= $product->deskripsi ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-title">
                        <h4 style="text-align:center;"> <?= $product->nama_minuman ?></h4>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
    </div>
</section>