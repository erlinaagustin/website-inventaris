<?php

namespace App\Controllers;

use App\Models\AsetModel;
use \TCPDF as TCPDF;

class LaporanPengadaanController extends BaseController
{
   public function index()
{
    $asetModel = new AsetModel();

    // Ambil data aset dengan status "diterima"
    $data['laporanPengadaan'] = $asetModel->where('status', 'diterima')->findAll();

    // Tambahkan filter berdasarkan tanggal jika ada data yang dikirimkan dari formulir
    $tanggalMulai = $this->request->getGet('tanggal_mulai');
    $tanggalAkhir = $this->request->getGet('tanggal_akhir');

    if (!empty($tanggalMulai) && !empty($tanggalAkhir)) {
        // Filter data berdasarkan rentang tanggal
        $data['laporanPengadaan'] = $asetModel
            ->getAsetByDateRange($tanggalMulai, $tanggalAkhir);

        $data['tanggalMulai'] = $tanggalMulai;
        $data['tanggalAkhir'] = $tanggalAkhir;
    }

    return view('data_laporan_pengadaan', $data);
}

public function resetFilter()
{
    return redirect()->to(base_url('laporan_pengadaan'));
}

    public function exportPDF($tanggalMulai = null, $tanggalAkhir = null)
    {
        $asetModel = new AsetModel();

        // Logika pencarian berdasarkan rentang tanggal jika parameter tidak null
        if (!empty($tanggalMulai) && !empty($tanggalAkhir)) {
            $laporanAset = $asetModel->getAsetByDateRange($tanggalMulai, $tanggalAkhir);
        } else {
            // Jika parameter null, ambil semua data dengan status 'diterima'
            $laporanAset = $asetModel->where('status', 'diterima')->findAll();
        }

        // Load TCPDF library dengan orientasi landscape
        $pdf = new TCPDF('L', 'mm', 'A4', true, 'UTF-8', false);

   // Set halaman PDF
$pdf->AddPage();

// Tambahkan judul halaman
$pdf->SetFont('times', 'B', 16);
$pdf->Cell(0, 10, 'Laporan Pengadaan Aset', 0, 1, 'C');

// Tambahkan filter tanggal jika ada
if (!empty($tanggalMulai) && !empty($tanggalAkhir)) {
    $pdf->Cell(0, 10, 'Tanggal: ' . date('d M Y', strtotime($tanggalMulai)) . ' - ' . date('d M Y', strtotime($tanggalAkhir)), 0, 1, 'C');
}

// Set posisi awal tabel (X, Y)
$startX = 10;
$startY = $pdf->GetY();

// Tambahkan data tabel
$pdf->SetFont('times', 'B', 12);
$pdf->Cell(20, 10, 'No', 1, 0, 'C');
$pdf->Cell(50, 10, 'Nama Aset', 1, 0, 'C');
$pdf->Cell(30, 10, 'Jumlah', 1, 0, 'C');
$pdf->Cell(50, 10, 'Perkiraan Harga', 1, 0, 'C');
$pdf->Cell(40, 10, 'Tanggal', 1, 0, 'C');
$pdf->Cell(90, 10, 'Keterangan', 1, 1, 'C');

$pdf->SetFont('times', '', 12);

foreach ($laporanAset as $index => $aset) {
    $pdf->Cell(20, 10, $index + 1, 1, 0, 'C');
    $pdf->Cell(50, 10, $aset['nama_aset'], 1);
    $pdf->Cell(30, 10, $aset['jumlah'], 1, 0, 'C');
    $pdf->Cell(50, 10, 'Rp ' . number_format($aset['perkiraan_harga'], 0, ',', '.'), 1, 0, 'C');
    $pdf->Cell(40, 10, $aset['tanggal'], 1);
    $pdf->Cell(90, 10, $aset['keterangan'], 1, 1);
}

// Set posisi akhir tabel (X, Y)
$endX = $pdf->GetX();
$endY = $pdf->GetY();

// Hitung lebar tabel
$tableWidth = $endX - $startX;

// Hitung posisi X agar tabel berada di tengah halaman
$tableX = ($pdf->getPageWidth() - $tableWidth) / 2;

// Set posisi X untuk membuat tabel berada di tengah
$pdf->SetXY($tableX, $startY);

// Output PDF ke browser
$pdf->Output('laporan_pengadaan_aset.pdf', 'D');

    
}

}
