<?= $this->extend('layout/template'); ?>
<?= $this->section('konten'); ?>


<!-- Page Heading -->
<div class="row mx-3">
    <div class="col-lg mt-5">
        <h1 class="h3 mb-2 text-gray-800">Edit data user</h1>
        <p class="mb-4">Silahkan Mengisi Form dibawah Untuk mengedit data user</p>
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
                <form action="<?= site_url('edit-user/') . $listUser['id_user'];?>" method="post">
                <input type="hidden" class="form-control" id="nip" placeholder="NIP" name="txtId" value="<?= $listUser['id_user'];?>">
                            <input type="hidden" class="form-control" id="nip" placeholder="NIP" name="txtNip" value="<?= $listUser['nip'];?>">
                    <div class="form-group row">
                        <label for="username" class="col-sm-2 col-form-label">Username</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="username" placeholder="Username" name="txtUsername" value="<?= $listUser['username']; ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="pass" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="pass" placeholder="Password" name="txtPass" >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="level" class="col-sm-2 col-form-label">Level</label>
                        <div class="col-sm-10">
                            <select id="level" class="form-control" name="txtLevel" >
                                <option selected>Admin</option>
                                <option>Pegawai</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>

</div>

<?= $this->endSection(); ?>