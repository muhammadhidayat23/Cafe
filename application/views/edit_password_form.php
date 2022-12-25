<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Reset Password</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="" method="POST">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Passsword Baru</label>
                                <input type="password" name="password" class="<?= form_error('password') ? 'invalid' : '' ?> form-control" placeholder="Password Baru" value="<?= set_value("password") ?>" required />
                                <div class="invalid-feedback">
                                    <?= form_error('password') ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Confirm Password</label>
                                <input type="password" name="password_confirm" class="<?= form_error('password_confirm') ? 'invalid' : '' ?> form-control" placeholder="Confirm Password" value="<?= set_value("password_confirm") ?>" required />
                                <div class="invalid-feedback">
                                    <?= form_error('password_confirm') ?>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" name="save" class="btn btn-primary">Save Password</button>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</section>