<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Update Profile</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="" method="POST">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nama</label>
                                <input type="text" name="name" class="form-control <?= form_error('name') ? 'invalid' : '' ?>" placeholder="Enter email" value="<?= form_error('name') ? set_value('name') : $current_user->name ?>" required maxlength="32" />
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="email" name="email" class="form-control <?= form_error('email') ? 'invalid' : '' ?>" placeholder="Enter email" value="<?= form_error('email') ? set_value('email') : $current_user->email ?>" required maxlength="32" />
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" name="save" class="btn btn-primary">Save & Update</button>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</section>