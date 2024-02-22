<?php

namespace App\Models;

use CodeIgniter\Model;

class PerbaikanModel extends Model
{
    protected $table = 'perbaikan';
    protected $primaryKey = 'id_perbaikan';
    protected $allowedFields = ['kode_aset', 'kerusakan', 'tanggal_perbaikan', 'jumlah', 'status', 'keterangan'];

    // Mendefinisikan relasi dengan tabel aset
    public function getPerbaikanWithDetails($id = null)
    {
        $this->join('aset', 'perbaikan.kode_aset = aset.kode_aset', 'left');
    
        // Sesuaikan select statement untuk menyertakan nama aset dari tabel aset
        $this->select('perbaikan.*, aset.nama_aset');

        if ($id != null) {
            return $this->where('perbaikan.id_perbaikan', $id)->first();
        }
    
        return $this->findAll();
    }

    public function getPerbaikanWithDetailsByDate($tanggalMulai, $tanggalAkhir)
{
    return $this->select('perbaikan.*, aset.nama_aset, aset.kode_aset')
        ->join('aset', 'aset.kode_aset = perbaikan.kode_aset')
        ->where('perbaikan.tanggal_perbaikan >=', $tanggalMulai)
        ->where('perbaikan.tanggal_perbaikan <=', $tanggalAkhir)
        ->findAll();
}

public function getPerbaikanByStatus($status = '')
{
    $this->select('perbaikan.*, aset.nama_aset'); // Replace 'perbaikan.*' with your perbaikan table name
    $this->join('aset', 'aset.kode_aset = perbaikan.kode_aset', 'left'); // Adjust the join to match your table structure

    if ($status != '') {
        $this->where('perbaikan.status =', $status); // Make sure to reference the correct table for the status
    }

    return $this->findAll();
}


public function getPerbaikanFiltered($tanggalMulai, $tanggalAkhir, $status)
{
    $this->select('perbaikan.*, aset.nama_aset, aset.kode_aset')
        ->join('aset', 'aset.kode_aset = perbaikan.kode_aset');

        if (!empty($tanggalMulai) && !empty($tanggalAkhir)) {
            $this->where('perbaikan.tanggal_perbaikan >=', $tanggalMulai)
                 ->where('perbaikan.tanggal_perbaikan <=', $tanggalAkhir);
        }
        
        if (!empty($status)) {
            $this->where('perbaikan.status', $status);
        }
        
    return $this->findAll();
}



public function Row($data)
{
    $nb = 0;
    foreach ($data as $col) {
        $nb = max($nb, $this->GetStringWidth($col));
    }
    $this->CheckPageBreak($nb);
    foreach ($data as $col) {
        $this->Cell($this->widths[0], 7, $col, 1);
    }
    $this->Ln();
}

    
}
