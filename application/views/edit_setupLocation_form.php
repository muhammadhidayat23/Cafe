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
                        <input type="text" class="form-control" name="title_1" placeholder="Masukkan Title, maksimal 8 kata" value="<?= $setup->title_1 ?>" />
                    </div>
                    <div class="form-group form-floating">
                        <label for="floatingTextarea">Sub Hero Title</label>
                        <input type="text" class="form-control" name="deskripsi_1" placeholder="Masukkan Sub Title, maksimal 20 kata" value="<?= $setup->deskripsi_1 ?>">
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label>Pilih Hero Images</label><br>
                            <input type="file" accept="image/*" name="hero_img_1" id="preview_gambar">
                        </div>
                        <div class="form-group col-sm-6 text-center">
                            <label>Preview Foto</label><br>
                            <img src="<?= base_url('/upload/hero/' . $setup->hero_img_1) ?>" id="load_gambar" style="width: 30%;">
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group form-floating">
                        <label for="floatingTextarea">Deskripsi Section 2</label>
                        <input type="text" class="form-control" name="title_1" placeholder="Masukkan Title, maksimal 8 kata" value="<?= $setup->title_1 ?>" />
                    </div>
                    <div class="form-group form-floating">
                        <label for="floatingTextarea">Link Alamat</label>
                        <input type="text" class="form-control" name="link_alamat" placeholder="Masukkan link alamat" value="<?= $setup->link_alamat ?>" />
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label>Pilih Hero Images</label><br>
                            <input type="file" accept="image/*" name="hero_img_2" id="preview_gambar_2">
                        </div>
                        <div class="form-group col-sm-6 text-center">
                            <label>Preview Foto</label><br>
                            <img src="<?= base_url('/upload/hero/' . $setup->hero_img_2) ?>" id="load_gambar_2" style="width: 30%;">
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="<?= site_url('admin/setup_location') ?>" class="btn btn-secondary">Kembali</a>
                </div>
            </form>
        </div>
        <!-- /.card -->
    </div>
</section>