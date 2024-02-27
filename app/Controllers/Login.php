<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Login extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'page login'
        ];

        return view('page-login', $data);
    }

    public function login()
    {

        $validasiForm = [
            'username' => 'required',
            'password' => 'required'
        ];

        if ($this->validate($validasiForm)) {

            $user = $this->user->getUser(
                $this->request->getPost('username'),
                $this->request->getPost('password')
            );

            if (count($user) == 1) {

                $dataSession = [
                    'username' => $user[0]['username'],
                    'password' => $user[0]['password'],
                    'level'    => $user[0]['level'],
                    'gambar_pegawai' => $user[0]['gambar'],
                    'nip_pegawai' => $user[0]['nip'],
                    'nama_pegawai' => $user[0]['nama_pegawai'],
                    'sudahkahLogin' => true
                ];

                session()->set($dataSession);
            }
            if (session()->get('level') === 'Admin') {
                return redirect()->to('/halaman-admin');
            } else if (session()->get('level') === 'Pegawai') {
                return redirect()->to('/halaman-pegawai');
            } else {
                return redirect()->to('/')->with('pesan', '<div class="text-center mt-3 font-weight-bold`"><p class="text-danger fw-bold">Username atau Password salah harap cek kembali</p></div>');
            }
        }
    }

    public function logout()
    {
        session()->destroy();

        return redirect()->to('/');
    }
}
