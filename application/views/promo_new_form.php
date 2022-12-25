<section class="content">
    <div class="container-fluid">
        <div class="card card-primary mt-5">
            <div class="card-header">
                <h3 class="card-title">Form Tambah Promo</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="form-group">
                        <label for="NamaProduk">Title</label>
                        <input type="text" class="form-control" name="title" placeholder="Masukkan Judul">
                    </div>
                    <div class="form-group form-floating">
                        <label for="floatingTextarea">Deskripsi</label>
                        <textarea class="form-control" name="deskripsi" placeholder="Masukkan Deskripsi" id="floatingTextarea"></textarea>
                    </div>
                    <div class="form-group form-floating">
                        <label for="floatingTextarea">Masa Promo</label>
                        <input type="text" class="form-control" name="masa_promo" placeholder="Masukkan Masa Berlaku Promo">
                    </div>
                    <div class="col-sm-6">
                        <!-- select -->
                        <div class="form-group">
                            <label>Status</label>
                            <select name="status" class="form-control" required>
                                <option value="">-Pilih Status-</option>
                                <option value="true">Aktif</option>
                                <option value="false">Non-Aktif</option>
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
                    <a href="<?= site_url('admin/promo') ?>" class="btn btn-secondary">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</section>