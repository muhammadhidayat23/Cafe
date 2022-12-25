<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= isset($meta['title']) ? $meta['title'] : 'Admin-Seduhan Rindu' ?></title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/adminlte.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
</head>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="<?= site_url('admin/dashboard/') ?>" class="nav-link">Home</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="<?= site_url('admin/dashboard') ?>" class="brand-link">
                <img src="<?= base_url() ?>./assets/images/logo.svg" alt="AdminLTE Logo" class="brand-image img-rectangle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Admin</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <?php
                        $avatar = $current_user->avatar ? base_url('upload/avatar/' . $current_user->avatar) : get_gravatar($current_user->email)
                        ?>
                        <img src="<?= $avatar ?>" class="img-circle elevation-2" alt="<?= htmlentities($current_user->name, TRUE) ?>">
                    </div>
                    <div class="info">
                        <a href="<?= site_url('admin/setting') ?>" class="d-block"><?= htmlentities($current_user->name) ?></a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="<?= site_url('admin/dashboard') ?>" class="<?php if ($this->uri->uri_string() == 'admin/dashboard') {
                                                                                    echo 'active';
                                                                                } ?> nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                    <i class="right "></i>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= site_url('admin/product') ?>" class="<?php if ($this->uri->uri_string() == 'admin/product') {
                                                                                    echo 'active';
                                                                                } ?> nav-link">
                                <i class="nav-icon fas fa-chart-pie"></i>
                                <p>
                                    Produk
                                    <i class="right"></i>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= site_url('admin/merchandise') ?>" class="<?php if ($this->uri->uri_string() == 'admin/merchandise') {
                                                                                        echo 'active';
                                                                                    } ?> nav-link">
                                <i class="nav-icon fas fa-chart-pie"></i>
                                <p>
                                    Merchandise
                                    <i class="right"></i>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= site_url('admin/promo') ?>" class="<?php if ($this->uri->uri_string() == 'admin/promo') {
                                                                                echo 'active';
                                                                            } ?> nav-link">
                                <i class="nav-icon fas fa-chart-pie"></i>
                                <p>
                                    Promo
                                    <i class="right"></i>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= site_url('admin/kategori') ?>" class="<?php if ($this->uri->uri_string() == 'admin/kategori') {
                                                                                    echo 'active';
                                                                                } ?> nav-link">
                                <i class="nav-icon fas fa-chart-pie"></i>
                                <p>
                                    Kategori Produk
                                    <i class="right"></i>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= site_url('admin/feedback') ?>" class="<?php if ($this->uri->uri_string() == 'admin/feedback') {
                                                                                    echo 'active';
                                                                                } ?> nav-link">
                                <i class="nav-icon fas fa-envelope"></i>
                                <p>
                                    Feedback
                                    <i class="right"></i>
                                </p>
                            </a>
                        </li>

                        <li class="nav-item menu-open">
                            <a href="<?= site_url('admin/setup_home') ?>" class="<?php if ($this->uri->uri_string() == 'admin/setup_home') {
                                                                                        echo 'active';
                                                                                    } elseif ($this->uri->uri_string() == 'admin/setup_story') {
                                                                                        echo 'active';
                                                                                    } elseif ($this->uri->uri_string() == 'admin/setup_menu') {
                                                                                        echo 'active';
                                                                                    } elseif ($this->uri->uri_string() == 'admin/setup_location') {
                                                                                        echo 'active';
                                                                                    } elseif ($this->uri->uri_string() == 'admin/setup_merchandise') {
                                                                                        echo 'active';
                                                                                    } elseif ($this->uri->uri_string() == 'admin/setup_contact') {
                                                                                        echo 'active';
                                                                                    } ?> nav-link">
                                <i class="nav-icon fas fa-wrench"></i>
                                <p>
                                    Setup
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?= site_url('admin/setup_home') ?>" class="<?php if ($this->uri->uri_string() == 'admin/setup_home') {
                                                                                                echo 'active';
                                                                                            } ?> nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Setup Home</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= site_url('admin/setup_story') ?>" class="<?php if ($this->uri->uri_string() == 'admin/setup_story') {
                                                                                                echo 'active';
                                                                                            } ?> nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Setup Stroy</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= site_url('admin/setup_menu') ?>" class="<?php if ($this->uri->uri_string() == 'admin/setup_menu') {
                                                                                                echo 'active';
                                                                                            } ?> nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Setup Menu</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= site_url('admin/setup_location') ?>" class="<?php if ($this->uri->uri_string() == 'admin/setup_location') {
                                                                                                    echo 'active';
                                                                                                } ?> nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Setup Location</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= site_url('admin/setup_merchandise') ?>" class="<?php if ($this->uri->uri_string() == 'admin/setup_merchandise') {
                                                                                                    echo 'active';
                                                                                                } ?> nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Setup Merchandise</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= site_url('admin/setup_contact') ?>" class="<?php if ($this->uri->uri_string() == 'admin/setup_contact') {
                                                                                                echo 'active';
                                                                                            } ?> nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Setup Contact</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="<?= site_url('admin/setting') ?>" class="<?php if ($this->uri->uri_string() == 'admin/setting') {
                                                                                    echo 'active';
                                                                                } ?> nav-link">
                                <i class="nav-icon fas fa-cog"></i>
                                <p>
                                    Setting
                                    <i class="right"></i>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= site_url('auth/logout') ?>" class="nav-link">
                                <i class="nav-icon fas fa-sign-out-alt"></i>
                                <p>
                                    Logout
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <?= $contents ?>
        </div>
        <!-- /.content-wrapper -->

        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <b>Version</b> 1.0.0
            </div>
            <strong>Copyright &copy; 2022 <a href="https://adminlte.io">seduhan rindu</a>.</strong> All rights reserved.
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="<?= base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url() ?>assets/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?= base_url() ?>assets/dist/js/demo.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="<?= base_url() ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url() ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?= base_url() ?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <!-- Page specific script -->
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
    <script>
        function bacaGambar(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#load_gambar').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#preview_gambar").change(function() {
            bacaGambar(this);
        });

        function bacaGambar2(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#load_gambar_2').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#preview_gambar_2").change(function() {
            bacaGambar2(this);
        });

        function bacaGambar3(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#load_gambar_3').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#preview_gambar_3").change(function() {
            bacaGambar3(this);
        });
    </script>
</body>

</html>