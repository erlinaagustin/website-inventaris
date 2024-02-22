<?php

namespace App\Controllers;

use App\Models\AsetNonaktifModel;
use \TCPDF as TCPDF;

class LaporanAsetNonaktifController extends BaseController
{
    public function index()
    {
        $asetNonaktifModel = new AsetNonaktifModel();
    
        // Ambil data aset nonaktif dengan detail
        $data['laporanAsetNonaktif'] = $asetNonaktifModel->getAsetNonAktifWithDetails();
    
        // Tambahkan filter tanggal
        $tanggalMulai = $this->request->getGet('tanggal_mulai');
        $tanggalAkhir = $this->request->getGet('tanggal_akhir');
    
        if (!empty($tanggalMulai) && !empty($tanggalAkhir)) {
            $data['laporanAsetNonaktif'] = $asetNonaktifModel->getFilteredAsetNonAktif($tanggalMulai, $tanggalAkhir);
        }
    
        $data['tanggalMulai'] = $tanggalMulai;
        $data['tanggalAkhir'] = $tanggalAkhir;
    
        return view('laporan_aset_nonaktif', $data);
    }
    public function resetFilter()
{
    return redirect()->to(base_url('laporan_aset_nonaktif'));
}

public function exportPDF($tanggalMulai = null, $tanggalAkhir = null)
{
    $asetNonaktifModel = new AsetNonaktifModel();
    if (!empty($tanggalMulai) && !empty($tanggalAkhir)) {
        $laporanAsetNonaktif = $asetNonaktifModel->getFilteredAsetNonAktif($tanggalMulai, $tanggalAkhir);
    } else {
        // Jika parameter null, ambil semua data dengan status 'diterima'
        $laporanAsetNonaktif = $asetModel->getAsetNonAktifWithDetails();
    }


    $pdf = new TCPDF('L', 'mm', 'A4', true, 'UTF-8', false);
    $pdf->AddPage();
    $pdf->SetFont('times', 'B', 16);
    $pdf->Cell(0, 10, 'Laporan Aset Nonaktif', 0, 1, 'C');
    $pdf->SetFont('times', 'B', 12);

    // Judul kolom
    $pdf->Cell(10, 10, 'No', 1, 0, 'C');
    $pdf->Cell(50, 10, 'Nama Aset', 1, 0, 'C');
    $pdf->Cell(30, 10, 'Kategori', 1, 0, 'C');
    $pdf->Cell(30, 10, 'Ruangan', 1, 0, 'C');
    $pdf->Cell(30, 10, 'Merek', 1, 0, 'C');
    $pdf->Cell(30, 10, 'Kondisi', 1, 0, 'C');
    $pdf->Cell(50, 10, 'Tanggal Nonaktif', 1, 1, 'C');

    $pdf->SetFont('times', '', 12);

    // Data
    foreach ($laporanAsetNonaktif as $index => $aset) {
        $pdf->Cell(10, 10, $index + 1, 1, 0, 'C');
        $pdf->Cell(50, 10, $aset['nama_aset'], 1);
        $pdf->Cell(30, 10, $aset['nama_kategori'], 1);
        $pdf->Cell(30, 10, $aset['nama_ruangan'], 1);
        $pdf->Cell(30, 10, $aset['nama_merek'], 1);
        $pdf->Cell(30, 10, $aset['nama_kondisi'], 1);
        $pdf->Cell(50, 10, $aset['tanggal_nonaktif'], 1);
        $pdf->Ln();
    }

    $pdf->Output('laporan_aset_nonaktif.pdf', 'D');
}

}
