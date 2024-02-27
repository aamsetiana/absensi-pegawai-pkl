<?= $this->extend('layout/template'); ?>
<?= $this->section('konten'); ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Absensi</h1>
    <p class="mb-4">Berikut adalah absensi pegawai.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <div class="row">
                        <div class="col-md-12">
                        <div class="float-right">
                            <a href="<?= site_url('cetak')?>" class="btn btn-primary btn-lg"><i class="fas fa-print"></i> Cetak</a>
                        </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-10">
                            <form class="form-inline" method="post" action="">
                                <div class="form-group mb-2">
                                    <label for="cari" class="sr-only">Cari data absensi</label>
                                    <input type="text" class="form-control" id="cari" placeholder="Cari data absensi" autocomplete="off" name="keyword">
                                </div>
                                <button type="submit" class="btn btn-primary mb-2 mx-3">Cari</button>
                            </form>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>NAMA PEGAWAI</th>
                                        <th>JAM MASUK</th>
                                        <th>JAM KELUAR</th>
                                        <th>KEHADIRAN</th>
                                        <th>GAMBAR</th>
                                        <th>KETERANGAN</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $no = 1; ?>
                                    <?php foreach ($listAbsensi as $a) : ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $a['nama_pegawai']; ?></td>
                                            <td><?= $a['jam_masuk']; ?></td>
                                            <td><?= $a['jam_keluar']; ?></td>
                                            <td><?= $a['kehadiran']; ?></td>
                                            <td><img src="<?= base_url('assets/img/absensi/') . $a['gambar']; ?>" alt="" width="110" height="100" class="img-responsive"></td>
                                            <td><?= $a['keterangan']; ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>

<?= $this->endSection(); ?>