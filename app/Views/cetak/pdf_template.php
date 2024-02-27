<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title><?= $title ?></title>
    <style>
        /* Gaya CSS untuk PDF */
        body {
            font-family: Arial, sans-serif;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .content {
            margin: 0 auto;
            width: 100%;
        }

        p {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table,
        th,
        td {
            border: 1px solid #000;
            padding: 5px;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <div class="header">
        <h1><?= $title ?></h1>
        <p>Rekap seluruh data absensi pegawai.</p>
        <hr>
    </div>
    <div class="content">
        <table>
            <thead>
                <tr>
                    <th>NO</th>
                    <th>NAMA PEGAWAI</th>
                    <th>JAM MASUK</th>
                    <th>JAM KELUAR</th>
                    <th>KEHADIRAN</th>
                    <th>KETERANGAN</th>
                    <th>GAMBAR</th>
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
                        <td><?= $a['keterangan']; ?></td>
                        <td><img src="<?= base_url('assets/img/absensi/') . $a['gambar']; ?>" alt="" width="110" height="100" class="img-responsive"></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>