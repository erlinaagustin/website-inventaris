<?php

namespace App\Models;

use CodeIgniter\Model;

class AsetNonAktifModel extends Model
{
    protected $table = 'aset_nonaktif';
    protected $primaryKey = 'kode_aset_nonaktif';
    protected $allowedFields = ['kode_aset','nama_aset','jumlah','harga', 'id_kategori', 'id_ruangan', 'id_merek', 'id_kondisi', 'tanggal_nonaktif','foto', 'qr_code'];

    // Metode untuk menyimpan data aset nonaktif
    public function saveAsetNonaktif($data)
    {
        return $this->insert($data);
    }

    public function getAsetNonAktifWithDetails($id = null)
{

    $this->join('kategori', 'aset_nonaktif.id_kategori = kategori.id_kategori', 'left');
    $this->join('ruangan', 'aset_nonaktif.id_ruangan = ruangan.id_ruangan', 'left');
    $this->join('merek', 'aset_nonaktif.id_merek = merek.id_merek', 'left');
    $this->join('kondisi', 'aset_nonaktif.id_kondisi = kondisi.id_kondisi', 'left');

    // Change this line to reference kelola_aset columns directly
    $this->select('aset_nonaktif.*,  kategori.nama_kategori, ruangan.nama_ruangan, merek.nama_merek, kondisi.nama_kondisi');

    if ($id != null) {
        return $this->where('aset_nonaktif.kode_aset_nonaktif', $id)->first();
    }

    return $this->findAll();
}




    public function getFilteredAsetNonAktif($tanggalMulai, $tanggalAkhir)
{
    $this->join('kategori', 'aset_nonaktif.id_kategori = kategori.id_kategori', 'left');
    $this->join('ruangan', 'aset_nonaktif.id_ruangan = ruangan.id_ruangan', 'left');
    $this->join('merek', 'aset_nonaktif.id_merek = merek.id_merek', 'left');
    $this->join('kondisi', 'aset_nonaktif.id_kondisi = kondisi.id_kondisi', 'left');

    $this->select('aset_nonaktif.*, kategori.nama_kategori, ruangan.nama_ruangan, merek.nama_merek, kondisi.nama_kondisi');

    $this->where('aset_nonaktif.tanggal_nonaktif >=', $tanggalMulai);
    $this->where('aset_nonaktif.tanggal_nonaktif <=', $tanggalAkhir);

    return $this->findAll();
}

}
