<section class="content">
    <div class="container-fluid">
        <a href="<?= site_url('admin/merchandise/add_merchandise') ?>" class="btn btn-primary mt-5 mb-4">+ Tambah produk</a>
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Data Merchandise</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <div class="row">
                        <div class="col-sm-12">
                            <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting sorting_asc text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">No</th>
                                        <th class="sorting sorting_asc text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Foto Produk</th>
                                        <th class="sorting text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Nama Produk</th>
                                        <th class="sorting text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Dibuat</th>
                                        <th class="sorting text-center" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Aksi</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($merchandises as $mcd) : ?>
                                        <tr class="odd">
                                            <td class="dtr-control sorting_1" tabindex="0"><?= $no++ ?></td>
                                            <td> <img src="<?= base_url() . '/upload/merchandise/' . $mcd->foto ?>" alt="" style="width: 8rem;">
                                                <a class="btn btn-info btn-sm" href="<?= site_url('admin/merchandise/edit_foto_merchandise' . $mcd->id_merchandise) ?>">
                                                    <i class="fas fa-images">
                                                    </i>
                                                    Edit Foto
                                                </a>
                                            </td>
                                            <td class="text-center">
                                                <?= $mcd->nama_barang ?>
                                            </td>
                                            <td class="text-center"><?= $mcd->created_at ?></td>
                                            <td class="project-actions text-right">
                                                <a class="btn btn-primary btn-sm" target="_blank" href="<?= site_url('home/merchandise/') ?>">
                                                    <i class="fas fa-eye">
                                                    </i>
                                                    View
                                                </a>
                                                <a class="btn btn-info btn-sm" href="<?= site_url('admin/merchandise/edit_merchandise/' . $mcd->id_merchandise) ?>">
                                                    <i class="fas fa-pencil-alt">
                                                    </i>
                                                    Edit
                                                </a>
                                                <a class="btn btn-danger btn-sm" href="#" data-delete-url="<?= site_url('admin/merchandise/delete/' . $mcd->id_merchandise) ?>" onclick="deleteConfirm(this)">
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
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</section>



<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function deleteConfirm(event) {
        Swal.fire({
            title: 'Hapus Produk Merchandise !',
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