<?php

namespace App\Models;

use CodeIgniter\Model;

class PengadaanModel extends Model
{
    protected $table = 'pengadaan';
    protected $primaryKey = 'id_pengadaan';

    protected $returnType = 'array';
    protected $allowedFields = ['id_pengadaan','tanggal', 'nomor_pengadaan', 'perihal', 'latar_belakang', 'permasalahan', 'usulan', 'pertimbangan', 'kode_aset'];

    // Contoh fungsi untuk menggabungkan data dengan tabel aset
    public function getPengadaanWithAset()
    {
        return $this->select('pengadaan.*, aset.nama_aset')
                    ->join('aset', 'aset.kode_aset = pengadaan.kode_aset')
                    ->findAll();
    }
}
