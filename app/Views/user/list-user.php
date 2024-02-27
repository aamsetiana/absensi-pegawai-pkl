<?= $this->extend('layout/template'); ?>
<?= $this->section('konten'); ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data User</h1>
    <p class="mb-4">Berikut adalah data user.</p>

    <div class="row mb-4">
        <div class="col-md-6">
            <?= session()->getFlashData('pesan'); ?>
        </div>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <form class="form-inline" method="post" action="">
                                <div class="form-group mb-2">
                                    <label for="cari" class="sr-only">Cari User</label>
                                    <input type="text" class="form-control" id="cari" placeholder="Cari User" autocomplete="off" name="keyword">
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
                                        <th>NIP</th>
                                        <th>USERNAME</th>
                                        <th>PASSWORD</th>
                                        <th>LEVEL</th>
                                        <th>AKSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($listUser as $u) : ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $u['nip']; ?></td>
                                            <td><?= $u['username']; ?></td>
                                            <td><?= $u['password']; ?></td>
                                            <td><?= $u['level']; ?></td>
                                            <td>
                                                <a href="<?= site_url('edit-user/' . $u['id_user']); ?>" class="btn btn-warning btn-md"><i class="fas fa-user-edit"></i></a>
                                                <a href="<?= site_url('hapus-user/' . $u['id_user']); ?>" class="btn btn-danger btn-md" onclick="return confirm('Apakah Anda yakin ingin menghapus item ini beserta filenya?')"><i class="fas fa-trash-alt"></i></a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="pagination">
                    <?= $pager->links() ?>
                </div>
            </div>
        </div>
    </div>


</div>X

<?= $this->endSection(); ?>