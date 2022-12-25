<section class="content">
    <div class="container-fluid">
        <div class="card card-primary my-3">
            <div class="card-header">
                <h3 class="card-title">Form Tambah Quote Halaman Home</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="form-group">
                        <label for="NamaProduk">Quote</label>
                        <input type="text" maxlength="80" class="form-control" name="quote" placeholder="Masukkan Quote Anda, maksimal 17 kata">
                    </div>
                    <div class="row">
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
                                <label>Hero Foto</label><br>
                                <input type="file" accept="image/*" name="quote_img" id="preview_gambar" required="required">
                            </div>
                            <div class="form-group col-sm-6 text-center">
                                <label>Preview Foto</label><br>
                                <img src="<?= base_url('assets/images/no-image.jpg') ?>" id="load_gambar" style="width: 30%;">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="<?= site_url('admin/setup_home') ?>" class="btn btn-secondary">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</section>

<script language="javascript" type="text/javascript">
    function limitText(limitField, limitNum) {
        if (limitField.value.length > limitNum) {
            limitField.value = limitField.value.substring(0, limitNum);
        }
    }
</script>