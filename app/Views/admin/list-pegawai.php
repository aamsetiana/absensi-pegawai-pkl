<?= $this->extend('layout/template'); ?>
<?= $this->section('konten'); ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Pegawai</h1>
    <p class="mb-4">Berikut adalah data pegawai.</p>

    <div class="row mx-1 mb-4">
        <a href="<?= site_url('tambah-pegawai'); ?>" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Tambah Data Pegawai</a>
    </div>

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
                                    <label for="cari" class="sr-only">Cari Pegawai</label>
                                    <input type="text" class="form-control" id="cari" placeholder="Cari Pegawai" autocomplete="off" name="keyword">
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
                                        <th>NAMA</th>
                                        <th>GAMBAR</th>
                                        <th>AKSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1 + ($pager->getCurrentPage() - 1) * $pager->getPerPage(); ?>
                                    <?php foreach ($listPegawai as $p) : ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $p['nip']; ?></td>
                                            <td><?= $p['nama_pegawai']; ?></td>
                                            <td><img src="<?= base_url('assets/img/pegawai/') . $p['gambar']; ?>" alt="" width="110" height="100" class="img-responsive"></td>
                                            <td>
                                                <button type="button" class="btn btn-success view-user" data-toggle="modal" data-target="#detailPegawai" data-nip="<?= $p['nip']; ?>">
                                                    <i class="fas fa-info-circle"></i>
                                                </button>
                                                <a href="<?= site_url('tambah-user/' . $p['nip']); ?>" class="btn btn-primary btn-md"><i class="fas fa-user-plus"></i></a>
                                                <a href="<?= site_url('edit-pegawai/' . $p['nip']); ?>" class="btn btn-warning btn-md"><i class="fas fa-user-edit"></i></a>
                                                <a href="<?= site_url('hapus-pegawai/' . $p['nip']); ?>" class="btn btn-danger btn-md" onclick="return confirm('Apakah Anda yakin ingin menghapus item ini beserta filenya?')"><i class="fas fa-trash-alt"></i></a>
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


</div>

<!-- Modal -->
<div class="modal fade" id="detailPegawai" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Detail Pegawai</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="pegawaiDetailContent">
                <!-- ini isi data pegawai -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        $('.view-user').click(function() {
            var nipPegawai = $(this).data('nip');

            $.ajax({
                url: '<?= site_url('detail-pegawai/'); ?>' + nipPegawai,
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    var pegawaiDetailHtml = '<div class="row">' +
                        '<div class="col-5">' +
                        '<img src=" <?= base_url('assets/img/pegawai/') ?>' + response.gambar + '" alt="" width="150px" height="150px">' +
                        '</div>' +
                        '<div class="col-7">' +
                        '<p><span class="font-weight-bold">NIP</span> : ' + response.nip + '</p>' +
                        '<p><span class="font-weight-bold">Nama</span> : ' + response.nama_pegawai + '</p>' +
                        '<p><span class="font-weight-bold">Tanggal Lahir</span> : ' + response.tgl_lahir + '</p>' +
                        '<p><span class="font-weight-bold">Alamat</span> : ' + response.alamat + '</p>' +
                        '<p><span class="font-weight-bold">No Telepon</span> : ' + response.no_telepon + '</p>' +
                        '</div>' +
                        '</div>';

                    $('#pegawaiDetailContent').html(pegawaiDetailHtml);
                },
                error: function() {
                    alert('Gagal Mengambil data');
                }
            });
        });
    });
</script>

<?= $this->endSection(); ?>