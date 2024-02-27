
<div class="row">
    <div class="col-5">
        <img src="<?= base_url('assets/img/'. $result->gambar) ; ?>" alt="" width="150px" height="150px">
    </div>
    <div class="col-7">
        <p><span class="font-weight-bold">NIP</span> : <?= $result->nip; ?></p>
        <p><span class="font-weight-bold">Nama</span> : <?= $result->nama_pegawai; ?></p>
        <p><span class="font-weight-bold">Tanggal Lahir</span> : <?= $result->tgl_lahir; ?></p>
        <p><span class="font-weight-bold">Alamat</span> : <?= $result->alamat; ?></p>
        <p><span class="font-weight-bold">No Telepon</span> : <?= $result->no_telepon; ?></h4>
    </div>
</div>
