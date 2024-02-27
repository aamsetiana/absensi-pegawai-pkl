<?= $this->extend('layout/template'); ?>
<?= $this->section('konten'); ?>

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Dashboard Admin</h1>
<p class="mb-4">Selamat datang admin</p>

<div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Jumlah Pegawai</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlahPegawai; ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-fw fa-users fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>