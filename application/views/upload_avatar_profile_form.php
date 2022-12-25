<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Ganti Foto Profile</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="card-body">
            <div class="row">
                <div class="form-group col-sm-6">
                    <label>Pilih Foto Produk</label><br>
                    <input type="file" name="avatar" id="preview_gambar" accept="image/png, image/jpeg, image/jpg, image/gif" required="required">
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
            <a href="<?= site_url('admin/setting') ?>" class="btn btn-secondary">Kembali</a>
        </div>
    </form>
</div>
<!-- /.card -->