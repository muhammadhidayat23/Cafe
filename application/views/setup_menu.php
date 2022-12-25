<section class="content">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Data Setup Halaman Menu</h1>
            </div>
        </div>
        <div class="toolbar my-3">
            <a href="<?= site_url('admin/setup_menu/input_setup_menu') ?>" class="btn btn-primary" role="button" data-bs-toggle="button">+ SetUp Home</a>
        </div>
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Setup Content Menu</h3>
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
                                Sub Title
                            </th>
                            <th style="width: 20%" class="text-center">
                                Status
                            </th>
                            <th style="width: 10%" class="text-center">
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($setups as $setup) : ?>
                            <tr>
                                <td> <img src="<?= base_url() . '/upload/hero/' . $setup->hero_img ?>" alt="" style="width: 8rem;">
                                </td>
                                <td class="text-center">
                                    <?= $setup->title ?>
                                </td>
                                <td class="text-center">
                                    <?= $setup->sub_title ?>
                                </td>
                                <td class="project-state text-center">
                                    <?php if ($setup->status === 'true') : ?>
                                        <span class="badge badge-success">Aktif</span>
                                    <?php else : ?>
                                        <span class="badge badge-warning">Non-Aktif</span>
                                    <?php endif ?>
                                </td>
                                <td class="project-actions text-center">
                                    <a class="btn btn-primary btn-sm" target="_blank" href="<?= site_url('home/menu') ?>">
                                        <i class="fas fa-eye">
                                        </i>
                                        View
                                    </a>
                                    <a class="btn btn-info btn-sm my-2" href="<?= site_url('admin/setup_menu/edit_setup_menu/' . $setup->id) ?>">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        Edit
                                    </a>
                                    <a class="btn btn-danger btn-sm" href="#" data-delete-url="<?= site_url('admin/setup_menu/delete/' . $setup->id) ?>" onclick="deleteConfirm(this)">
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
            <form action="<?= site_url('admin/setup_menu/edit_hero_menu/' . $setup->id) ?>" method="POST" enctype="multipart/form-data">
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
                    <a href="<?= site_url('admin/setup_menu') ?>" class="btn btn-secondary">Kembali</a>
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
            title: 'Hapus Produk !',
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