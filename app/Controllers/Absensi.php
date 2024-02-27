<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\I18n\Time;

class Absensi extends BaseController
{
    public function absensi()
    {
        $data = [
            'title' => 'List Absensi',
            'listAbsensi' => $this->absensi->getAbsensi(),
            'akses' => session()->get('level')
        ];

        return view('absensi/list-absensi', $data);
    }

    public function absensiManual()
    {
        $data = [
            'title' => 'Absensi Manual',
            'akses' => session()->get('level')
        ];

        return view('absensi/absen-manual', $data);
    }

    public function absensiMasuk()
    {
        $data = [
            'title' => 'Absensi Masuk',
            'akses' => session()->get('level')
        ];

        return view('absensi/absen-masuk', $data);
    }

    public function absensiScan()
    {
        $data = [
            'title' => 'Absensi Scan',
            'akses' => session()->get('level')
        ];

        return view('absensi/absen-scan', $data);
    }

    public function simpanAbsenManual()
    {
        // Tangkap data dari form
        $data = [
            'nip' => $this->request->getPost('txtNip'),
            'kehadiran' => $this->request->getPost('txtKehadiran'),
            'keterangan' => $this->request->getPost('txtKeterangan'),
            'jam_masuk' => Time::now('Asia/Jakarta')
        ];

        // Proses upload file
        $file = $this->request->getFile('txtGambar');
        if ($file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move('../public/assets/img/absensi', $newName);
            $data['gambar'] = $newName;
        }

        // Simpan data ke basis data
        $this->absensi->insert($data);

        return redirect()->to('absen-manual')->with('pesan', '<div class="alert alert-success" role="alert">
        Absen telah berhasil
      </div>');
    }

    public function keluar()
    {
        $nip = session()->get('nip_pegawai'); 

        $absensi = $this->absensi->where('nip', $nip)
            ->where('jam_keluar', null)
            ->first();

        if ($absensi) {
            $jamKeluar = Time::now('Asia/Jakarta');
            $this->absensi->update($absensi['id_absensi'], ['jam_keluar' => $jamKeluar]);

            return redirect()->to('/absen-manual')->with('pesan', '<div class="alert alert-success" role="alert">
            Berhasil absen keluar
          </div>');
        } else {
            return redirect()->to('/absen-manual')->with('pesan', '<div class="alert alert-danger" role="alert">
        Tidak ada sesi yang sedang berlangsung
      </div>');
        }
    }

    public function detail($id)
    {
        $data = $this->absensi->find($id);
        return $this->response->setJSON($data);
    }
}
