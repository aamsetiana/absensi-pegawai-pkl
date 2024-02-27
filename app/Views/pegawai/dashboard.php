<?= $this->extend('layout/template'); ?>
<?= $this->section('konten'); ?>

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Dashboard Pegawai</h1>
<p class="mb-4">Selamat datang <?= session()->get('nama_pegawai'); ?></p>

<div class="row">

    <div class="col-lg-7 my-4">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <img src="<?= base_url('assets/img/pegawai/') . session()->get('gambar_pegawai') ?>" width="200px">
                    <div class="col-md-8">
                        <div class="mx-4 my-2 font-weight-bold">Nip : <?= session()->get('nip_pegawai'); ?></div>
                        <div class="mx-4 my-2 font-weight-bold">Nama : <?= session()->get('nama_pegawai'); ?></div>
                        <div class="mx-4 font-weight-bold">Jabatan : <?= session()->get('level'); ?></div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>



<?= $this->endSection(); ?>