<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $title; ?></title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url('assets/vendor/fontawesome-free/css/all.min.css'); ?>" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Custom styles for this template-->
    <link href="<?= base_url('assets/css/sb-admin-2.min.css'); ?>" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.css" />

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center">
                <div class="sidebar-brand-text mx-3">SIAP<sup></sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <?php if ($akses == 'Pegawai') : ?>
                <li class="nav-item" data-url="halaman-pegawai">
                    <a class="nav-link" href="<?= site_url('halaman-pegawai'); ?>">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Dashboard</span></a>
                </li>
            <?php endif; ?>

            <?php if ($akses == 'Admin') : ?>
                <li class="nav-item" data-url="halaman-admin">
                    <a class="nav-link" href="<?= site_url('halaman-admin'); ?>">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Dashboard</span></a>
                </li>
            <?php endif; ?>

            <!-- Heading -->
            <?php if ($akses == 'Admin') : ?>
                <!-- Divider -->
                <hr class="sidebar-divider">
                <div class="sidebar-heading">
                    Admin
                </div>
            <?php endif; ?>

            <?php if ($akses == 'Admin') : ?>
                <li class="nav-item" data-url="pegawai">
                    <a class="nav-link" href="<?= site_url('list-pegawai'); ?>">
                        <i class="fas fa-fw fa-users"></i>
                        <span>Pegawai</span></a>
                </li>
            <?php endif; ?>
            <!-- Nav Item - Charts -->

            <!-- Nav Item - Charts -->
            <?php if ($akses == 'Admin') : ?>
                <li class="nav-item" data-url="user">
                    <a class="nav-link" href="<?= site_url('list-user'); ?>">
                        <i class="fas fa-fw fa-users"></i>
                        <span>User</span></a>
                </li>
            <?php endif; ?>

            <!-- Nav Item - Tables -->
            <?php if ($akses == 'Admin') : ?>
                <li class="nav-item" data-url="absensi">
                    <a class="nav-link" href="<?= site_url('list-absensi'); ?>">
                        <i class="fas fa-fw fa-table"></i>
                        <span>Absensi</span></a>
                </li>
            <?php endif; ?>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Heading -->
            <div class="sidebar-heading">
                Pegawai
            </div>

            <!-- Nav Item - Tables -->
            <?php if ($akses == 'Admin' || $akses == 'Pegawai') : ?>
                <li class="nav-item" data-url="absen-manual">
                    <a class="nav-link" href="<?= site_url('absen-manual') ?>">
                        <i class="far fa-fw fa-address-book"></i>
                        <span>Absen Manual</span></a>
                </li>
            <?php endif; ?>

            <!-- Nav Item - Tables -->
            <li class="nav-item" data-url="absen-scan">
                <a class="nav-link" href="<?= site_url('absen-scan') ?>">
                    <i class="fas fa-fw fa-expand"></i>
                    <span>Absen Scan</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" data-toggle="modal" data-target="#logoutModal" href="<?= site_url('logout'); ?>">
                    <i class="fas fa-sign-out-alt fa-fw"></i>
                    <span>Logout</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= session()->get('nama_pegawai'); ?></span>
                                <img class="img-profile rounded-circle" src="<?= base_url('assets/img/pegawai/') . session()->get('gambar_pegawai') ?>">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">

                                <a class="dropdown-item" href="<?= site_url('logout'); ?>" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <?php
                    echo $this->renderSection('konten');
                    ?>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white ">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright © Kelompok bang arifz</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Logout</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Yakin mau logout?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="<?= site_url('logout'); ?>">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url('assets/vendor/jquery/jquery.min.js'); ?>"></script>
    <script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/jquery-3.7.1.min.js'); ?>"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script> -->

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url('assets/vendor/jquery-easing/jquery.easing.min.js'); ?>"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url('assets/js/sb-admin-2.min.js'); ?>"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.js"></script>



    <script>
        $(document).ready(function() {
            var currentLocation = window.location.href;

            $('.navbar-nav li').each(function() {
                var link = $(this).data('url');

                if (currentLocation.indexOf(link) !== -1) {
                    $(this).addClass('active');
                }
            });
        });
    </script>
</body>

</html>