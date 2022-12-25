<section class="content">
    <div class="container-fluid">
        <div class="card card-primary mt-5">
            <div class="card-header">
                <h3 class="card-title">Form Tambah Merchandise</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="form-group">
                        <label for="NamaProduk">Nama Produk</label>
                        <input type="text" class="form-control" name="nama_barang" placeholder="Masukkan Nama Produk">
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
                    <a href="<?= site_url('admin/merchandise') ?>" class="btn btn-secondary">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</section>