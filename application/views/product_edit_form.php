<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Ubah Data Produk</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="card-body">
            <div class="form-group">
                <label for="NamaProduk">Nama Produk</label>
                <input type="text" class="form-control" name="nama_minuman" placeholder="Masukkan Nama Produk" value="<?= $product->nama_minuman ?>" />
            </div>
            <div class="form-group form-floating">
                <label for="floatingTextarea">Deskripsi Produk</label>
                <input type="text" class="form-control" name="deskripsi" placeholder="Masukkan Deskripsi Produk" value="<?= $product->deskripsi ?>">
            </div>
            <div class="col-sm-6">
                <!-- select -->
                <div class="form-group">
                    <label>Kategori</label>
                    <select name="id_kategori" class="form-control" required>
                        <option value="<?= $product->id_kategori ?>"><?= $product->nama_kategori ?></option>
                        <?php foreach ($kategoris as $ktg) { ?>
                            <option value="<?= $ktg->id_kategori ?>"><?= $ktg->nama_kategori ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-sm-6">
                    <label>Foto Produk</label><br>
                    <input type="file" accept="image/*" name="foto" id="preview_gambar">
                </div>
                <div class=" form-group col-sm-6 text-center">
                    <label>Preview Foto</label><br>
                    <img src="<?= base_url('/upload/product/' . $product->foto) ?>" id="load_gambar" style="width: 30%;">
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
<!-- /.card -->