<?php

namespace App\Models;

use CodeIgniter\Model;

class Mpegawai extends Model
{
    protected $table            = 'tbl_pegawai';
    protected $primaryKey       = 'nip';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nip', 'nama_pegawai', 'tgl_lahir', 'gambar', 'alamat', 'no_telepon', 'barcode'];

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

    public function deleteItem($nip)
    {
        // Dapatkan informasi file yang akan dihapus
        $item = $this->find($nip);
        $filePath = $item['gambar'];

        // Hapus file terkait jika ada
        if ($filePath) {
            unlink(FCPATH . '../public/assets/img/pegawai/' . $filePath); // Sesuaikan dengan lokasi penyimpanan file
        }

        // Hapus data dari basis data
        return $this->delete($nip);
    }

    public function updatePegawai($nip, $data)
    {
        return $this->update($nip, $data);
    }

    public function getDataByNip($nip)
    {
        return $this->find($nip); 
    }

    public function searchUsers($keyword)
    {
        return $this->like('nip', $keyword)
                    ->orLike('nama_pegawai', $keyword)
                    ->findAll();
    }

    public function getJumlahPegawai()
    {
        $db      = \Config\Database::connect();
		$builder = $db->table('tbl_pegawai');
        return $builder->countAllResults(); // Menghitung jumlah data
	
    }
}
