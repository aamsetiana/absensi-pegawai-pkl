<?= $this->extend('layout/template'); ?>
<?= $this->section('konten'); ?>

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Form Absensi Manual Pegawai</h1>
<p class="mb-4">Silahkan untuk mengisi form absensi dibawah ini.</p>

<!-- DataTales Example -->
<div class="row">
    <div class="col-md-6">
        <div class="card shadow mb-4">
            <div class="card-body">
                <form action="<?= site_url('simpan-absensi-manual')?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                        <input type="hidden" class="form-control-file" id="exampleFormControlFile1" name="txtNip" value="<?= session()->get('nip_pegawai'); ?>">
                    </div>
                    <div class="form-group">
                        <label for="inputState">Kehadiran</label>
                        <select id="inputState" class="form-control" name="txtKehadiran">
                            <option selected>Hadir</option>
                            <option>Ijin</option>
                            <option>Sakit</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Keterangan</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Boleh dikosongkan apabila hadir" name="txtKeterangan"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlFile1">Gambar</label>
                        <input type="file" class="form-control-file" id="exampleFormControlFile1" name="txtGambar">
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>

</div>

<?= $this->endSection(); ?>