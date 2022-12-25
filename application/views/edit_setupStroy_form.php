<section class="content">
    <div class="container-fluid">
        <div class="card card-primary my-3">
            <div class="card-header">
                <h3 class="card-title">Ubah Setup Hero Halaman Story</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="form-group">
                        <label for="HeroProduk">Hero Title</label>
                        <input type="text" class="form-control" name="title" placeholder="Masukkan Title, maksimal 8 kata" value="<?= $setup->title ?>" />
                    </div>
                    <div class="form-group form-floating">
                        <label for="floatingTextarea">Sub Hero Title</label>
                        <input type="text" class="form-control" name="sub_title" placeholder="Masukkan Sub Title, maksimal 20 kata" value="<?= $setup->sub_title ?>">
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="HeroProduk">Title Section 2</label>
                        <input type="text" class="form-control" name="title_2" placeholder="Masukkan Title, maksimal 8 kata" value="<?= $setup->title_2 ?>" />
                    </div>
                    <div class="form-group form-floating">
                        <label for="floatingTextarea">Deskripsi Section 2</label>
                        <textarea class="form-control" name="deskripsi_2" rows="4" placeholder="Enter ..."><?= $setup->deskripsi_2 ?></textarea>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="HeroProduk">Hero Title</label>
                        <input type="text" class="form-control" name="title_3" placeholder="Masukkan Title, maksimal 8 kata" value="<?= $setup->title_3 ?>" />
                    </div>
                    <div class="form-group form-floating">
                        <label for="floatingTextarea">Sub Hero Title</label>
                        <textarea class="form-control" name="deskripsi_3" rows="4" placeholder="Masukkan Sub Title, maksimal 20 kata"><?= $setup->deskripsi_3 ?></textarea>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="<?= site_url('admin/setup_story') ?>" class="btn btn-secondary">Kembali</a>
                </div>
            </form>
        </div>
        <!-- /.card -->
    </div>
</section>