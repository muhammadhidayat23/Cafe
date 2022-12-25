<section class="content">
    <div class="container-fluid">
        <div class="card card-primary mt-5">
            <div class="card-header">
                <h3 class="card-title">Form Tambah Produk</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="form-group">
                        <label for="NamaProduk">Nama Produk</label>
                        <input type="text" class="form-control" name="nama_minuman" placeholder="Masukkan Nama Produk">
                    </div>
                    <div class="form-group form-floating">
                        <label for="floatingTextarea">Deskripsi Produk</label>
                        <textarea class="form-control" name="deskripsi" placeholder="Masukkan Deskripsi Produk" id="floatingTextarea"></textarea>
                    </div>
                    <div class="col-sm-6">
                        <!-- select -->
                        <div class="form-group">
                            <label>Kategori</label>
                            <select name="id_kategori" class="form-control" required>
                                <option value="">-Pilih Kategori-</option>
                                <?php foreach ($kategoris as $ktg) { ?>
                                    <option value="<?= $ktg->id_kategori ?>"><?= $ktg->nama_kategori ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label>Foto Produk</label><br>
                            <input type="file" accept="image/*" name="foto" id="preview_gambar" required="required">
                        </div>
                        <div class="form-group col-sm-6 text-center">
                            <label>Preview Foto</label><br>
                            <img src="<?= base_url('assets/images/no-image.jpg') ?>" id="load_gambar" style="width: 30%;">
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="<?= site_url('admin/product') ?>" class="btn btn-secondary">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</section>