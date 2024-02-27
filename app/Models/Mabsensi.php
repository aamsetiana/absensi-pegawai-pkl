<?php

namespace App\Models;

use CodeIgniter\Model;

class Mabsensi extends Model
{
    protected $table            = 'tbl_absensi';
    protected $primaryKey       = 'id_absensi';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_absensi', 'nip', 'jam_masuk', 'jam_keluar', 'kehadiran', 'keterangan', 'gambar'];

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

    public function getAbsensi()
    {
        $db      = \Config\Database::connect();
		$builder = $db->table('tbl_absensi');
		$builder->select('tbl_absensi.id_absensi, tbl_absensi.nip, tbl_absensi.jam_masuk, tbl_absensi.jam_keluar, tbl_absensi.keterangan, tbl_absensi.gambar, tbl_pegawai.nama_pegawai, tbl_absensi.kehadiran');
		$builder->join('tbl_pegawai', 'tbl_absensi.nip = tbl_pegawai.nip');
		return $builder->get()->getResultArray();
    }
}
