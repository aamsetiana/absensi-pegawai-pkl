<?= $this->extend('layout/template'); ?>
<?= $this->section('konten'); ?>


<!-- Page Heading -->
<div class="row mx-3">
    <div class="col-lg mt-5">
        <h1 class="h3 mb-2 text-gray-800">Tambah Data Pegawai</h1>
        <p class="mb-4">Silahkan Mengisi Form dibawah Untuk Menambah Data Pegawai</p>
    </div>
</div>

<?php if (session()->has('errors')) : ?>
    <ul>
        <?php foreach (session('errors') as $error) : ?>
            <li><?= esc($error) ?></li>
        <?php endforeach ?>
    </ul>
<?php endif ?>

<div class="row mx-4">

    <div class="col-lg-6 my-4">

        <!-- Basic Card Example -->
        <div class="card mb-4">
            <div class="card-body">
                <form action="<?= site_url('tambah'); ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group row">
                        <label for="nip" class="col-sm-2 col-form-label">NIP</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nip" placeholder="NIP" name="txtNip" autocomplete="off">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama" placeholder="Nama Pegawai" name="txtNama" autocomplete="off">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tgl_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" id="tgl_lahir" name="txtTglLahir">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="telepon" class="col-sm-2 col-form-label">No Telepon</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="telepon" placeholder="No Telepon" name="txtTelepon" autocomplete="off">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                            <textarea name="txtAlamat" id="alamat" autocomplete="off"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="gambar" class="col-sm-2 col-form-label">Gambar</label>
                        <div class="col-sm-10">
                        <input type="file" class="form-control-file" id="gambar" name="txtGambar">
                        </div>
                    </div>

                    <!-- <div class="form-group row">
                        <div class="col-sm-3">
                            <img src="" class="img-thumbnail img-preview">
                        </div>
                    </div> -->


                    <div class="form-group row">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Tambah</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>

</div>

<?= $this->endSection(); ?>