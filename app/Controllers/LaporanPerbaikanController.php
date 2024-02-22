<?php

namespace App\Controllers;

use App\Models\PerbaikanModel;
use App\Models\AsetModel;

class LaporanPerbaikanController extends BaseController
{
    public function index()
    {
        // Instansiasi model PerbaikanModel
        $perbaikanModel = new PerbaikanModel();
    
        // Mengambil data perbaikan dengan informasi aset
        $data['laporanPerbaikan'] = $perbaikanModel->getPerbaikanWithDetails();
    
        // Menampilkan view dengan data yang telah diambil
        return view('laporan_perbaikan.php', $data);
    }

    // Tambahkan metode atau fungsi lainnya sesuai kebutuhan

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


}
