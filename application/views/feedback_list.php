<section class="content my-5">
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header p-2">
                    <h2>Feedback</h2>
                </div><!-- /.card-header -->
                <div class="card-body">
                    <div class="tab-content">
                        <div class="active tab-pane" id="activity">
                            <!-- Post -->
                            <?php foreach ($feedbacks as $feedback) : ?>
                                <div class="post">
                                    <span class="username">
                                        <a href="#"><b><?= $feedback->nama ?></b></a>
                                        <a href="#" data-delete-url="<?= site_url('admin/feedback/delete/' . $feedback->id) ?>" onclick="deleteConfirm(this)" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                                    </span>
                                    <div>
                                        <span class="description"><?= $feedback->email ?> - <?= $feedback->create_at ?></span>
                                    </div>
                                    <!-- /.user-block -->
                                    <p>
                                        <?= $feedback->pesan ?>
                                    </p>
                                </div>
                            <?php endforeach ?>
                            <!-- /.post -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function deleteConfirm(event) {
        Swal.fire({
            title: 'Delete Confirmation!',
            text: 'Yakin mau dihapus?',
            icon: 'warning',
            showCancelButton: true,
            cancelButtonText: 'No',
            confirmButtonText: 'Yes Delete',
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