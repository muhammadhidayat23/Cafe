<section class="content">
    <div class="container-fluid">
        <div class="card card-primary my-3">
            <div class="card-header">
                <h3 class="card-title">Ubah Setup Hero Halaman Merchandise</h3>
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
                        <label for="floatingTextarea">Deskripsi</label>
                        <input type="text" class="form-control" name="deskripsi" placeholder="Masukkan Sub Title, maksimal 20 kata" value="<?= $setup->deskripsi ?>">
                    </div>
                    <div class="col-sm-6">
                        <!-- select -->
                        <div class="form-group">
                            <label>Status</label>
                            <select name="status" class="form-control" required>
                                <?php if ($setup->status === 'true') : ?>
                                    <option value="true">Aktif</option>
                                <?php else : ?>
                                    <option value="false">Non-Aktif</option>
                                <?php endif ?>
                                <option value="true">Aktif</option>
                                <option value="false">Non-Aktif</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label>Pilih Hero Images</label><br>
                            <input type="file" accept="image/*" name="hero_img" id="preview_gambar">
                        </div>
                        <div class="form-group col-sm-6 text-center">
                            <label>Preview Foto</label><br>
                            <img src="<?= base_url('/upload/hero/' . $setup->hero_img) ?>" id="load_gambar" style="width: 30%;">
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="<?= site_url('admin/setup_merchandise') ?>" class="btn btn-secondary">Kembali</a>
                </div>
            </form>
        </div>
        <!-- /.card -->
    </div>
</section>