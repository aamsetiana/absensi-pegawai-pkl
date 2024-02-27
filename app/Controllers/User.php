<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class User extends BaseController
{
    public function user()
    {
        $data = [
            'title' => 'List User',
            'listUser' => $this->user->paginate(5),
            'pager' => $this->user->pager,
            'akses' => session()->get('level')
        ];

        return view('user/list-user', $data);
    }

    public function simpanUser()
    {
        $data = [
            'id_user' => $this->request->getPost('txtId'),
            'username' => $this->request->getPost('txtUsername'),
            'password' => md5($this->request->getPost('txtPass')),
            'nip' => $this->request->getPost('txtNip'),
            'level' => $this->request->getPost('txtLevel')
        ];

        $this->user->insert($data);

        return redirect()->to('list-pegawai')->with('pesan', '<div class="alert alert-success" role="alert">
        Data user berhasil ditambah
      </div>');
    }

    public function editUser($id)
    {
        $data = [
            'title' => 'Edit Data User',
            'listUser' => $this->user->find($id),
            'akses' => session()->get('level')
        ];

        return view('user/edit-user', $data);
    }

    public function prosesEdit($id)
    {
        $originalPassword = $this->user->find($id);

        $data = [
            'id_user' => $this->request->getPost('txtId'),
            'username' => $this->request->getPost('txtUsername'),
            'password' => ($this->request->getPost('txtPass') ? md5($this->request->getPost('txtPass')) : $originalPassword['password']),
            'nip' => $this->request->getPost('txtNip'),
            'level' => $this->request->getPost('txtLevel')
        ];

        $this->user->update($id, $data);

        return redirect()->to('list-user')->with('pesan', '<div class="alert alert-success" role="alert">
            Data user berhasil diubah
          </div>');
    }

    public function hapus($id)
    {
        $this->user->delete($id);
        return redirect()->to('list-user')->with('pesan', '<div class="alert alert-success" role="alert">
            Data user berhasil dihapus
          </div>');
    }
}
