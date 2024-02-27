<?php

namespace App\Models;

use CodeIgniter\Model;

class MUser extends Model
{
    protected $table            = 'tbl_user';
    protected $primaryKey       = 'id_user';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_user', 'username', 'password', 'level', 'nip'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function getUser($user, $pass)
    {

        $where=[
            'username'=>$user,
            'password'=>md5($pass)
        ];
        $user = new MUser;
        $user->select(" tbl_user.username, tbl_user.password, tbl_user.level, tbl_pegawai.nama_pegawai, tbl_pegawai.gambar, tbl_pegawai.nip");
        $user->join("tbl_pegawai" , "tbl_user.nip = tbl_pegawai.nip");
        $user->where($where);
        return $user->findAll();  
    }

    public function getMenuByRole($userRole)
    {
        $query = $this->db->table('tbl_user')
            ->where('level', $userRole)
            ->get();

        // Kembalikan hasil query sebagai array
        return $query->getResultArray();
    }
}
