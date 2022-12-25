<section class="content">
    <div class="container-fluid">
        <div class="card card-primary my-3">
            <div class="card-header">
                <h3 class="card-title">Form Edit Data Setup Halaman Contact</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                    <div>
                        <h3>
                            Section 1
                        </h3>
                    </div>
                    <div class="form-group">
                        <label for="NamaProduk">Hero Title</label>
                        <input type="text" maxlength="32" class="form-control" name="title" placeholder="Masukkan Title, maksimal 5 kata" value="<?= $setup->title ?>">
                    </div>
                    <div class="form-group form-floating">
                        <label for="floatingTextarea">Deskripsi</label>
                        <textarea type="text" maxlength="132" class="form-control" name="deskripsi" placeholder="Masukkan Deskripsi, maksimal 20 kata" id="floatingTextarea"><?= $setup->deskripsi ?>"</textarea>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label>Hero Foto 1</label><br>
                            <input type="file" accept="image/*" name="hero_img_1" id="preview_gambar">
                        </div>
                        <div class="form-group col-sm-6 text-center">
                            <label>Preview Foto</label><br>
                            <img src="<?= base_url('/upload/hero/' . $setup->hero_img_1) ?>" id="load_gambar" style="width: 30%;">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label>Hero Foto 2</label><br>
                            <input type="file" accept="image/*" name="hero_img_2" id="preview_gambar_2">
                        </div>
                        <div class="form-group col-sm-6 text-center">
                            <label>Preview Foto</label><br>
                            <img src="<?= base_url('/upload/hero/' . $setup->hero_img_2) ?>" id="load_gambar_2" style="width: 30%;">
                        </div>
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
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="<?= site_url('admin/setup_contact') ?>" class="btn btn-secondary">Kembali</a>
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