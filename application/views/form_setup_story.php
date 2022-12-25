<section class="content">
    <div class="container-fluid">
        <div class="card card-primary my-3">
            <div class="card-header">
                <h3 class="card-title">Form Tambah Setup Hero Halaman Story</h3>
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
                        <input type="text" maxlength="32" class="form-control" name="title" placeholder="Masukkan Title, maksimal 8 kata">
                    </div>
                    <div class="form-group form-floating">
                        <label for="floatingTextarea">Sub Title</label>
                        <textarea type="text" maxlength="124" class="form-control" name="sub_title" placeholder="Masukkan Sub Title, maksimal 20 kata" id="floatingTextarea"></textarea>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label>Hero Foto</label><br>
                            <input type="file" accept="image/*" name="hero_img" id="preview_gambar" required="required">
                        </div>
                        <div class="form-group col-sm-6 text-center">
                            <label>Preview Foto</label><br>
                            <img src="<?= base_url('assets/images/no-image.jpg') ?>" id="load_gambar" style="width: 30%;">
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div>
                        <h3>
                            Section 2
                        </h3>
                    </div>
                    <div class="form-group">
                        <label for="NamaProduk">Hero Title</label>
                        <input type="text" maxlength="20" class="form-control" name="title_2" placeholder="Masukkan Title, maksimal 3 kata">
                    </div>
                    <div class="form-group form-floating">
                        <label for="floatingTextarea">Sub Title</label>
                        <textarea type="text" maxlength="180" class="form-control" name="deskripsi_2" placeholder="Masukkan Sub Title, maksimal 30 kata" id="floatingTextarea"></textarea>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-6 text-center">
                            <label>Preview Foto</label><br>
                            <img src="<?= base_url('assets/images/no-image.jpg') ?>" id="load_gambar_2" style="width: 30%;">
                        </div>
                        <div class="form-group col-sm-6">
                            <label>Hero Foto</label><br>
                            <input type="file" accept="image/*" name="hero_img_2" id="preview_gambar_2" required="required">
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div>
                        <h3>
                            Section 3
                        </h3>
                    </div>
                    <div class="form-group">
                        <label for="NamaProduk">Hero Title</label>
                        <input type="text" maxlength="20" class="form-control" name="title_3" placeholder="Masukkan Title, maksimal 3 kata">
                    </div>
                    <div class="form-group form-floating">
                        <label for="floatingTextarea">Sub Title</label>
                        <textarea type="text" maxlength="180" class="form-control" name="deskripsi_3" placeholder="Masukkan Sub Title, maksimal 20 kata" id="floatingTextarea"></textarea>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label>Hero Foto</label><br>
                            <input type="file" accept="image/*" name="hero_img_3" id="preview_gambar_3" required="required">
                        </div>
                        <div class="form-group col-sm-6 text-center">
                            <label>Preview Foto</label><br>
                            <img src="<?= base_url('assets/images/no-image.jpg') ?>" id="load_gambar_3" style="width: 30%;">
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="<?= site_url('admin/setup_story') ?>" class="btn btn-secondary">Kembali</a>
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