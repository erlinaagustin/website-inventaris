<?php

namespace App\Models;

use CodeIgniter\Model;
use Endroid\QrCode\QrCode;

class PengolahanAsetModel extends Model
{
    protected $table = 'kelola_aset'; // Nama tabel
    protected $primaryKey = 'id_kelola'; // Kunci utama

    protected $useTimestamps = false; // Ubah menjadi true jika Anda menggunakan fitur timestamp

    protected $allowedFields = [
        'kode_aset', 'nama_aset', 'harga', 'jumlah','id_kategori', 'id_ruangan', 'id_merek', 'id_kondisi', 
        'tanggal', 'keterangan', 'foto', 'qr_code'
    ];

    // Mendefinisikan relasi dengan tabel kategori, ruangan, merek, dan kondisi
    public function getAsetWithDetails($id = null)
    {
        $this->join('kategori', 'kelola_aset.id_kategori = kategori.id_kategori', 'left');
        $this->join('ruangan', 'kelola_aset.id_ruangan = ruangan.id_ruangan', 'left');
        $this->join('merek', 'kelola_aset.id_merek = merek.id_merek', 'left');
        $this->join('kondisi', 'kelola_aset.id_kondisi = kondisi.id_kondisi', 'left');
    
        // Sesuaikan select statement untuk menyertakan nama aset dari tabel aset
        $this->select('kelola_aset.*, kategori.nama_kategori, ruangan.nama_ruangan, merek.nama_merek, kondisi.nama_kondisi');
    
        if ($id != null) {
            return $this->where('kelola_aset.id_kelola', $id)->first();
        }
    
        return $this->findAll();
    }

    public function getAsetByDateRange($tanggalMulai, $tanggalAkhir)
{
    $this->join('kategori', 'kelola_aset.id_kategori = kategori.id_kategori', 'left');
    $this->join('ruangan', 'kelola_aset.id_ruangan = ruangan.id_ruangan', 'left');
    $this->join('merek', 'kelola_aset.id_merek = merek.id_merek', 'left');
    $this->join('kondisi', 'kelola_aset.id_kondisi = kondisi.id_kondisi', 'left');

    $this->select('kelola_aset.*, kategori.nama_kategori, ruangan.nama_ruangan, merek.nama_merek, kondisi.nama_kondisi');

    $this->where('kelola_aset.tanggal >=', $tanggalMulai);
    $this->where('kelola_aset.tanggal <=', $tanggalAkhir);

    return $this->findAll();
}

function getAsetGroupCategory()
{
    $this->join('kategori', 'kategori.id = id_kategori', 'left');
    $this->select("kategori.nama_kategori, COUNT(id) as total");
    $this->groupBy('kelola_aset.kategori_id');

    return $this;
}



}
