<section class="content">
    <div class="container-fluid">
        <div class="card card-primary mt-5">
            <div class="card-header">
                <h3 class="card-title">Form Edit Merchandise</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="form-group">
                        <label for="NamaProduk">Nama Produk</label>
                        <input type="text" class="form-control" name="nama_barang" placeholder="Masukkan Nama Produk" value="<?= $merchandise->nama_barang ?>">
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label>Foto Produk</label><br>
                            <input type="file" accept="image/*" name="foto" id="preview_gambar">
                        </div>
                        <div class=" form-group col-sm-6 text-center">
                            <label>Preview Foto</label><br>
                            <img src="<?= base_url('/upload/merchandise/' . $merchandise->foto) ?>" id="load_gambar" style="width: 30%;">
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