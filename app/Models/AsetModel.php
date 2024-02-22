<?php

namespace App\Models;

use CodeIgniter\Model;

class AsetModel extends Model
{
    protected $table = 'aset'; // Nama tabel
    protected $primaryKey = 'kode_aset'; // Kunci utama tabel

    protected $useAutoIncrement = true; // Aktifkan auto increment karena kunci utamanya adalah INT

    protected $returnType = 'array'; // Format data yang dikembalikan (array/object)

    protected $allowedFields = ['nama_aset', 'jumlah', 'perkiraan_harga', 'tanggal', 'status', 'keterangan']; // Field yang bisa diisi, kode_aset dihapus karena otomatis diatur oleh database

    protected $useTimestamps = false; // Non-aktifkan timestamps jika tidak diperlukan

    // Konfigurasi validasi jika diperlukan
    protected $validationRules = [
        'nama_aset' => 'required|max_length[255]',
        'jumlah' => 'numeric',
        'perkiraan_harga' => 'numeric',
        'tanggal' => 'valid_date',
        'status' => 'permit_empty|in_list[diterima,ditolak]', // Memperbolehkan status kosong (NULL)
        'keterangan' => 'string'
    ];

    public function getAsetOptions()
    {
        $query = $this->select('kode_aset, nama_aset')->findAll();
        return $query;
    }

    public function getAsetByDateRange($tanggalMulai, $tanggalAkhir)
    {
        return $this->where('tanggal >=', $tanggalMulai)
            ->where('tanggal <=', $tanggalAkhir)
            ->findAll();
    }

    

    protected $validationMessages = []; // Pesan error validasi kustom jika diperlukan

    // Callbacks
    protected $beforeInsert = [];
    protected $afterInsert = [];
    protected $beforeUpdate = [];
    protected $afterUpdate = [];
    protected $beforeFind = [];
    protected $afterFind = [];
    protected $beforeDelete = [];
    protected $afterDelete = [];
}
