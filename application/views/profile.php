<!-- Profile Image -->
<section class="content-header">
    <div class="container-fluid">
        <div class="card card-primary card-outline">
            <div class="card-body box-profile">
                <div class="text-center">
                    <?php
                    $avatar = $current_user->avatar ?
                        base_url('upload/avatar/' . $current_user->avatar)
                        : get_gravatar($current_user->email)
                    ?>
                    <img class="profile-user-img img-fluid img-circle" src="<?= $avatar ?>" alt="<?= htmlentities($current_user->name, TRUE) ?>">
                </div>

                <h3 class="profile-username text-center"><?= $current_user->name ?></h3>
                <div class="text-center">
                    <a href="<?= site_url('admin/setting/upload_avatar') ?>">Change Avatar</a>
                </div>


                <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                        <b>Nama :</b> <a class="float-right mx-3" href="<?= site_url('admin/setting/edit_profile') ?>">Ubah</a> <a class="float-right" style="color:black"><?= html_escape($current_user->name) ?></a>

                    </li>
                    <li class="list-group-item">
                        <b>Email :</b> <a class="float-right mx-3" href="<?= site_url('admin/setting/edit_profile') ?>">Ubah</a> <a class="float-right" style="color:black"><?= html_escape($current_user->email) ?></a>
                    </li>
                    <li class="list-group-item">
                        <b>Password :</b> <a class="float-right mx-3" href="<?= site_url('admin/setting/edit_password') ?>">Ubah</a> <a class="float-right" style="color:black">******</a>
                    </li>
                </ul>

                <a href="<?= site_url('auth/logout') ?>" class="btn btn-primary btn-block"><b>Logout</b></a>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</section>
<!-- /.card -->

<?php if ($this->session->flashdata('pesan')) : ?>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
            title: '<?= $this->session->flashdata('pesan') ?>'
        })
    </script>
<?php endif ?>