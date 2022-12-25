<section class="content">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Data Setup Halaman Story</h1>
            </div>
        </div>
        <div class="toolbar my-3">
            <a href="<?= site_url('admin/setup_story/input_setup_story') ?>" class="btn btn-primary" role="button" data-bs-toggle="button">+ SetUp Story</a>
        </div>
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Setup Content Stroy</h3>
            </div>
            <div class="card-body p-0">
                <table class="table table-striped projects">
                    <thead>
                        <tr>
                            <th style="width: 20%">
                                Hero Foto
                            </th>
                            <th style="width: 20%" class="text-center">
                                Title
                            </th>
                            <th style="width: 20%" class="text-center">
                                Deskripsi
                            </th>
                            <th style="width: 10%" class="text-center">
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($setups_story as $setup) : ?>
                            <!-- Section 1 -->
                            <tr>
                                <td>
                                    <h5>Section 1</h5>
                                </td>
                            </tr>
                            <tr>
                                <td> <img src="<?= base_url() . '/upload/hero/' . $setup->hero_img ?>" alt="" style="width: 8rem;">
                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal-lg">
                                        <i class="fas fa-images">
                                        </i>
                                        Edit Foto
                                    </button>
                                </td>
                                <td class="text-center">
                                    <?= $setup->title ?>
                                </td>
                                <td class="text-center">
                                    <?= $setup->sub_title ?>
                                </td>
                                <td class="project-actions text-center">
                                    <a class="btn btn-primary btn-sm" target="_blank" href="<?= site_url('home/story') ?>">
                                        <i class="fas fa-eye">
                                        </i>
                                        View
                                    </a>
                                    <a class="btn btn-info btn-sm my-2" href="<?= site_url('admin/setup_story/edit_setup_story/' . $setup->id) ?>">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        Edit
                                    </a>
                                    <a class="btn btn-danger btn-sm" href="#" data-delete-url="<?= site_url('admin/setup_story/delete/' . $setup->id) ?>" onclick="deleteConfirm(this)">
                                        <i class="fas fa-trash">
                                        </i>
                                        Delete
                                    </a>
                                </td>
                            </tr>

                            <!-- Section 2 -->
                            <tr>
                                <td>
                                    <h5>Section 2</h5>
                                </td>
                            </tr>
                            <tr>
                                <td> <img src="<?= base_url() . '/upload/hero/' . $setup->hero_img_2 ?>" alt="" style="width: 8rem;">
                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal-lg-2">
                                        <i class="fas fa-images">
                                        </i>
                                        Edit Foto
                                    </button>
                                </td>
                                <td class="text-center">
                                    <?= $setup->title_2 ?>
                                </td>
                                <td class="text-center">
                                    <?= $setup->deskripsi_2 ?>
                                </td>
                                <td class="project-actions text-center">
                                    <a class="btn btn-primary btn-sm" target="_blank" href="<?= site_url('home/stroy') ?>">
                                        <i class="fas fa-eye">
                                        </i>
                                        View
                                    </a>
                                    <a class="btn btn-info btn-sm my-2" href="<?= site_url('admin/setup_story/edit_setup_story/' . $setup->id) ?>">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        Edit
                                    </a>
                                    <a class="btn btn-danger btn-sm" href="#" data-delete-url="<?= site_url('admin/setup_story/delete/' . $setup->id) ?>" onclick="deleteConfirm(this)">
                                        <i class="fas fa-trash">
                                        </i>
                                        Delete
                                    </a>
                                </td>
                            </tr>

                            <!-- Section 3 -->
                            <tr>
                                <td>
                                    <h5>Section 3</h5>
                                </td>
                            </tr>
                            <tr>
                                <td> <img src="<?= base_url() . '/upload/hero/' . $setup->hero_img_3 ?>" alt="" style="width: 8rem;">
                                    <!-- <a class="btn btn-info btn-sm" href="<?= site_url('admin/setup_story/edit_hero_story_3/' . $setup->id) ?>"> -->
                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal-lg-3">
                                        <i class="fas fa-images">
                                        </i>
                                        Edit Foto
                                    </button>
                                    <!-- </a> -->
                                </td>
                                <td class="text-center">
                                    <?= $setup->title_3 ?>
                                </td>
                                <td class="text-center">
                                    <?= $setup->deskripsi_3 ?>
                                </td>
                                <td class="project-actions text-center">
                                    <a class="btn btn-primary btn-sm" target="_blank" href="<?= site_url('home/story') ?>">
                                        <i class="fas fa-eye">
                                        </i>
                                        View
                                    </a>
                                    <a class="btn btn-info btn-sm my-2" href="<?= site_url('admin/setup_story/edit_setup_story/' . $setup->id) ?>">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        Edit
                                    </a>
                                    <a class="btn btn-danger btn-sm" href="#" data-delete-url="<?= site_url('admin/setup_story/delete/' . $setup->id) ?>" onclick="deleteConfirm(this)">
                                        <i class="fas fa-trash">
                                        </i>
                                        Delete
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<!-- Modal Edit Hero Image Section 1 -->
<div class="modal fade" id="modal-lg">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?= site_url('admin/setup_story/edit_hero_story/' . $setup->id) ?>" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label>Pilih Foto Produk</label><br>
                            <input type="file" accept="image/*" name="hero_img" id="preview_gambar" required="required">
                        </div>
                        <div class="form-group col-sm-6 text-center">
                            <label>Preview Foto</label><br>
                            <img src="<?= base_url() . '/upload/hero/' . $setup->hero_img ?>" alt="" style="width: 8rem;">
                            <h5>This...</h5>
                            <img src="<?= base_url('assets/images/down-arrow.png') ?>" style="width: 10%;">
                            <h5>To This</h5>
                            <img src="<?= base_url('assets/images/no-image.jpg') ?>" id="load_gambar" style="width: 30%;">
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
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!-- Modal Edit Hero Image Section 2 -->
<div class="modal fade" id="modal-lg-2">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?= site_url('admin/setup_story/edit_hero_story_2/' . $setup->id) ?>" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label>Pilih Foto Produk</label><br>
                            <input type="file" accept="image/*" name="hero_img_2" id="preview_gambar_2" required="required">
                        </div>
                        <div class="form-group col-sm-6 text-center">
                            <label>Preview Foto</label><br>
                            <img src="<?= base_url() . '/upload/hero/' . $setup->hero_img_2 ?>" alt="" style="width: 8rem;">
                            <h5>This...</h5>
                            <img src="<?= base_url('assets/images/down-arrow.png') ?>" style="width: 10%;">
                            <h5>To This</h5>
                            <img src="<?= base_url('assets/images/no-image.jpg') ?>" id="load_gambar_2" style="width: 30%;">
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
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!-- Modal Edit Hero Image Section 3 -->
<div class="modal fade" id="modal-lg-3">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?= site_url('admin/setup_story/edit_hero_story_3/' . $setup->id) ?>" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label>Pilih Foto Produk</label><br>
                            <input type="file" accept="image/*" name="hero_img_3" id="preview_gambar_3" required="required">
                        </div>
                        <div class="form-group col-sm-6 text-center">
                            <label>Preview Foto</label><br>
                            <img src="<?= base_url() . '/upload/hero/' . $setup->hero_img_3 ?>" alt="" style="width: 8rem;">
                            <h5>This...</h5>
                            <img src="<?= base_url('assets/images/down-arrow.png') ?>" style="width: 10%;">
                            <h5>To This</h5>
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
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function deleteConfirm(event) {
        Swal.fire({
            title: 'Semua Section Akan Dihapus !',
            text: 'Anda yakin ingin menghapus?',
            icon: 'warning',
            showCancelButton: true,
            cancelButtonText: 'Tidak',
            confirmButtonText: 'Ya Hapus',
            confirmButtonColor: 'red'
        }).then(dialog => {
            if (dialog.isConfirmed) {
                window.location.assign(event.dataset.deleteUrl);
            }
        });
    }
</script>

<?php if ($this->session->flashdata('message')) : ?>
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        Toast.fire({
            icon: 'success',
            title: '<?= $this->session->flashdata('message') ?>'
        })
    </script>
<?php endif ?>