<?php

namespace App\Controllers;

use App\Models\PerbaikanModel;
use App\Models\AsetModel;
use \TCPDF as TCPDF;


class DataLaporanPerbaikanController extends BaseController
{
    public function index()
    {
        $perbaikanModel = new PerbaikanModel();
    
        // Ambil data filter tanggal dan status jika ada
        $tanggalMulai = $this->request->getGet('tanggal_mulai');
        $tanggalAkhir = $this->request->getGet('tanggal_akhir');
        $status = $this->request->getGet('status'); // tambahkan ini
    
        // Logika pencarian berdasarkan rentang tanggal dan status
        if (!empty($tanggalMulai) && !empty($tanggalAkhir) && $status <> 'semua') {
            $data['laporanPerbaikan'] = $perbaikanModel->getPerbaikanFiltered($tanggalMulai, $tanggalAkhir, $status); // tambahkan metode ini
        } else if (!empty($tanggalMulai) && !empty($tanggalAkhir) && $status == 'semua') {
            $data['laporanPerbaikan'] = $perbaikanModel->getPerbaikanWithDetailsByDate($tanggalMulai, $tanggalAkhir);
        } else if ($status) {
            $data['laporanPerbaikan'] = $perbaikanModel->getPerbaikanByStatus($status); // tambahkan ini
        } else {
            $data['laporanPerbaikan'] = $perbaikanModel->getPerbaikanWithDetails();
        }
    
        // Simpan data tanggal untuk tetap menampilkan di form
        $data['tanggalMulai'] = $tanggalMulai;
        $data['tanggalAkhir'] = $tanggalAkhir;
        $data['status'] = $status; // tambahkan ini
    
        // Menampilkan view dengan data yang telah diambil
        return view('data_laporan_perbaikan.php', $data);
    }
    
    
    public function resetFilter()
    {
        return redirect()->to(base_url('data_laporan_perbaikan'));
    }
    

    public function tambah()
    {
        $asetModel = new AsetModel();
        $data['asetOptions'] = $asetModel->getAsetOptions(); 

        return view('tambah_perbaikan.php', $data);
    }

    public function simpan()
    {
        $perbaikanModel = new PerbaikanModel();

        // Validasi formulir disini jika diperlukan

        // Proses penyimpanan data perbaikan
        $data = [
            'kode_aset' => $this->request->getPost('kode_aset'),
            'kerusakan' => $this->request->getPost('kerusakan'),
            'tanggal_perbaikan' => $this->request->getPost('tanggal_perbaikan'),
            'jumlah' => $this->request->getPost('jumlah'),
            'status' => $this->request->getPost('status'),
            'keterangan' => $this->request->getPost('keterangan'),
        ];

        $perbaikanModel->insert($data);

        return redirect()->to(base_url('laporan_perbaikan')); // Redirect ke halaman index setelah penyimpanan berhasil
    }

    public function edit($id)
    {
        helper('form');
        $perbaikanModel = new PerbaikanModel();
        $asetModel = new AsetModel(); // Instansiasi model AsetModel

        // Ambil data perbaikan dan opsi aset
        $data['perbaikan'] = $perbaikanModel->getPerbaikanWithDetails($id);
        $data['asetOptions'] = $asetModel->findAll(); // Ubah sesuai kebutuhan

        return view('edit_perbaikan', $data);
    }

    public function update()
{
    $model = new PerbaikanModel();

    $data = [
        'kerusakan' => $this->request->getVar('kerusakan'),
        'tanggal_perbaikan' => $this->request->getVar('tanggal_perbaikan'),
        'jumlah' => $this->request->getVar('jumlah'),
        'status' => $this->request->getVar('status'),
        'keterangan' => $this->request->getVar('keterangan'),
        'kode_aset' => $this->request->getVar('kode_aset')
    ];

    $id_perbaikan = $this->request->getVar('id_perbaikan'); // Ambil nilai dari form

    $model->update($id_perbaikan, $data);

    // Redirect ke halaman utama laporan perbaikan setelah pembaruan berhasil
    return redirect()->to(base_url('laporan_perbaikan'));
}

public function delete($id_perbaikan)
{
    $model = new PerbaikanModel();
    $model->delete($id_perbaikan);

    // Redirect ke halaman utama pengadaan setelah penghapusan berhasil
    return redirect()->to(base_url('laporan_perbaikan'));
}

public function exportPDF($tanggalMulai, $tanggalAkhir, $status)
{
    $perbaikanModel = new PerbaikanModel();

    // Inisialisasi data awal
    $laporanPerbaikan = $perbaikanModel->getPerbaikanWithDetails();

    if ($tanggalMulai <> 0 && $tanggalAkhir <> 0 && $status <> 'semua') {
        $laporanPerbaikan = $perbaikanModel->getPerbaikanFiltered($tanggalMulai, $tanggalAkhir, $status); // tambahkan metode ini
    } else if ($tanggalMulai <> 0 && $tanggalAkhir <> 0 && $status == 'semua') {
        $laporanPerbaikan = $perbaikanModel->getPerbaikanWithDetailsByDate($tanggalMulai, $tanggalAkhir);
    } else if ($tanggalMulai == 0 && $tanggalAkhir == 0 && $status) {
        $laporanPerbaikan = $perbaikanModel->getPerbaikanByStatus($status); // tambahkan ini
    } else {
        $laporanPerbaikan = $perbaikanModel->getPerbaikanWithDetails();
    }    

    // Inisialisasi TCPDF
    $pdf = new TCPDF('L', 'mm', 'A4', true, 'UTF-8', false);
    $pdf->AddPage();

    // Tambahkan judul
    $pdf->SetFont('times', 'B', 16);
    $pdf->Cell(0, 10, 'Laporan Perbaikan', 0, 1, 'C');

    // Tambahkan filter tanggal jika ada
    if (!empty($tanggalMulai) && !empty($tanggalAkhir)) {
        $pdf->Cell(0, 10, 'Tanggal: ' . $tanggalMulai . ' - ' . $tanggalAkhir, 0, 1, 'C');
    }

    // Tambahkan header tabel
    $pdf->SetFont('times', 'B', 12);
    $pdf->Cell(10, 10, 'No', 1, 0, 'C');
    $pdf->Cell(30, 10, 'Nama Aset', 1, 0, 'C');
    $pdf->Cell(30, 10, 'Kode Aset', 1, 0, 'C');
    $pdf->Cell(40, 10, 'Kerusakan', 1, 0, 'C');
    $pdf->Cell(50, 10, 'Tanggal Perbaikan', 1, 0, 'C');
    $pdf->Cell(20, 10, 'Jumlah', 1, 0, 'C');
    $pdf->Cell(40, 10, 'Status', 1, 0, 'C');
    $pdf->Cell(50, 10, 'Keterangan', 1, 1, 'C');

    // Isi tabel
    $pdf->SetFont('times', '', 12);
    foreach ($laporanPerbaikan as $index => $perbaikan) {
        $pdf->Cell(10, 10, $index + 1, 1, 0, 'C');
        $pdf->Cell(30, 10, $perbaikan['nama_aset'], 1);
        $pdf->Cell(30, 10, $perbaikan['kode_aset'], 1);
        $pdf->Cell(40, 10, $perbaikan['kerusakan'], 1);
        $pdf->Cell(50, 10, $perbaikan['tanggal_perbaikan'], 1);
        $pdf->Cell(20, 10, $perbaikan['jumlah'], 1, 0, 'C');
        $pdf->Cell(40, 10, $perbaikan['status'], 1, 0, 'C');
        $pdf->Cell(50, 10, $perbaikan['keterangan'], 1, 1);
    }

    // Output PDF ke browser
    $pdf->Output('laporan_perbaikan.pdf', 'D'); // 'I' untuk ditampilkan di browser, 'D' untuk di-download
}




}
