<?= $this->extend('layout/template'); ?>
<?= $this->section('konten'); ?>

<!-- Page Heading -->
<div class="row mt-5">
    <div class="mx-auto mt-5">
        <h1 class="h3 mb-2 text-gray-800">Absensi manual pegawai</h1>
    </div>
</div>
<p class="mb-4"></p>

<div class="row mb-4">
        <div class="col-md-3 mx-auto">
            <div class="text-center">
                <?= session()->getFlashData('pesan'); ?>
            </div>
        </div>
    </div>

<div class="row mx-1 mb-4">
    <div class="mx-auto">
        <a href="<?= site_url('absen-masuk'); ?>" class="btn btn-success">Absen Masuk</a>
        <form action="<?= base_url('absen-keluar') ?>" method="post" class="d-inline-block">
            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah yakin anda ingin absen keluar?')">Absen Keluar</button>
        </form>
    </div>
</div>

<?= $this->endSection(); ?>