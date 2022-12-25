<section class="content">
    <div class="container-fluid">
        <div class="card card-primary mt-5">
            <div class="card-header">
                <h3 class="card-title">Form Tambah Kategori</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="form-group">
                        <label for="NamaProduk">Nama Kategori</label>
                        <input type="text" class="form-control" name="nama_kategori" placeholder="Masukkan Nama Kategori">
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="<?= site_url('admin/kategori') ?>" class="btn btn-secondary">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</section>