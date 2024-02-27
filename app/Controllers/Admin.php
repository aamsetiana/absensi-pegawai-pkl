<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Admin extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Halaman Admin',
            'jumlahPegawai' => $this->pegawai->getJumlahPegawai(),
            'akses' => session()->get('level')
        ];

        return view('admin/dashboard', $data);
    }
}
