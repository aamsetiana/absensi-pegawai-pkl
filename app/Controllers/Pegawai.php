<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Pegawai extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Halaman pegawai',
            'akses' => session()->get('level')
        ];


        return view('pegawai/dashboard', $data);
    }

    public function pegawai()
    {
        $data = [
            'title' => 'List Pegawai',
            'listPegawai' => $this->pegawai->paginate(5),
            'pager' => $this->pegawai->pager,
            'akses' => session()->get('level')
        ];

        return view('admin/list-pegawai', $data);
    }

    public function tambahUser($nip)
    {
        $data = [
            'title' => 'Tambah data user',
            'listPegawai' => $this->pegawai->find($nip),
            'akses' => session()->get('level')
        ];

        return view('user/tambah-user', $data);
    }

    public function tes(){
        echo"tes aja";
    }

    public function tambahPegawai()
    {
        $data = [
            'title' => 'Tambah Pegawai',
            'akses' => session()->get('level')
        ];

        return view('admin/tambah-data-pegawai', $data);
    }

    public function simpanPegawai()
    {

        // Tangkap data dari form
        $data = [
            'nip' => $this->request->getPost('txtNip'),
            'nama_pegawai' => $this->request->getPost('txtNama'),
            'tgl_lahir' => $this->request->getPost('txtTglLahir'),
            'alamat' => $this->request->getPost('txtAlamat'),
            'no_telepon' => $this->request->getPost('txtTelepon')
        ];

        // Proses upload file
        $file = $this->request->getFile('txtGambar');
        if ($file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move('../public/assets/img/pegawai', $newName);
            $data['gambar'] = $newName;
        }

        // Simpan data ke basis data
        $this->pegawai->insert($data);

        return redirect()->to('list-pegawai')->with('pesan', '<div class="alert alert-success" role="alert">
        Data pegawai berhasil ditambah
      </div>');
    }

    public function editPegawai($nip)
    {
        $data = [
            'title' => 'Edit Pegawai',
            'listPegawai' => $this->pegawai->find($nip),
            'akses' => session()->get('level')
        ];

        return view('admin/edit-data-pegawai', $data);
    }

    public function prosesEdit($nip)
    {

        $data = [
            'nip' => $this->request->getPost('txtNip'),
            'nama_pegawai' => $this->request->getPost('txtNama'),
            'tgl_lahir' => $this->request->getPost('txtTglLahir'),
            'gambar' => '',
            'alamat' => $this->request->getPost('txtAlamat'),
            'no_telepon' => $this->request->getPost('txtTelepon')
        ];


        $file = $this->request->getFile('txtGambar');

         $existingData = $this->pegawai->getDataByNip($nip);

        if ($file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move(WRITEPATH . '../public/assets/img/pegawai/', $newName); 
            $data['gambar'] = $newName;

            $existingData = $this->pegawai->getDataByNip($nip); 
            if (!empty($existingData['gambar']) && file_exists(WRITEPATH . '../public/assets/img/pegawai/' . $existingData['gambar'])) {
                unlink(WRITEPATH . '../public/assets/img/pegawai/' . $existingData['gambar']);
            }
        } elseif ($existingData['gambar']) {
            $data['gambar'] = $existingData['gambar'];
        }

        $this->pegawai->updatePegawai($nip, $data);

        return redirect()->to('list-pegawai')->with('pesan', '<div class="alert alert-success" role="alert">
        Data pegawai berhasil diubah
      </div>');
    }

    public function hapus($nip)
    {
        $this->pegawai->deleteItem($nip);
        return redirect()->to('list-pegawai')->with('pesan', '<div class="alert alert-success" role="alert">
            Data pegawai berhasil dihapus
          </div>');
    }

    public function detail($nip)
    {
        $data = $this->pegawai->getDataByNip($nip);
        return $this->response->setJSON($data);
    }

    // public function cari()
    // {
    //     $data = [
    //         'title' => 'List Pegawai'
    //     ];

    //     $keyword = $this->request->getVar('keyword');
    //     $data['listPegawai'] = $this->pegawai->searchUsers($keyword);

    //     return view('admin/list-pegawai', $data);
    // }
}
