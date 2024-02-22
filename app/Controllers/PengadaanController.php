<?php

namespace App\Controllers;

use App\Models\AsetModel;
use App\Models\PengadaanModel;
use CodeIgniter\Controller;

class PengadaanController extends Controller
{
    public function index()
    {
        $asetModel = new AsetModel();
        $data['aset'] = $asetModel->where('status', 'diterima')->findAll(); // Menampilkan data aset dengan status 'diterima'

        return view('pengadaan.php', $data);
    }

    public function tambah()
    {

        helper('form');
        $asetModel = new AsetModel(); 
        $data['asetList'] = $asetModel->findAll(); // Mengambil semua data aset
    
        return view('form_pengadaan', $data); // Kirim data aset ke view
    }
    


    public function simpan()
    {
        $model = new PengadaanModel();
    
        // Mengumpulkan data dari form
        $data = [
            'id_pengadaan' => $this->request->getVar('id_pengadaan'),
            'tanggal' => $this->request->getVar('tanggal'),
            'nomor_pengadaan' => $this->request->getVar('nomor_pengadaan'),
            'perihal' => $this->request->getVar('perihal'),
            'latar_belakang' => $this->request->getVar('latar_belakang'),
            'permasalahan' => $this->request->getVar('permasalahan'),
            'usulan' => $this->request->getVar('usulan'),
            'pertimbangan' => $this->request->getVar('pertimbangan'),
            'kode_aset' => $this->request->getVar('kode_aset')
        ];
    
       
        // Menyimpan data ke database
        $model->insert($data);
    
        // Redirect ke halaman utama pengadaan setelah penyimpanan berhasil
        return redirect()->to(base_url('pengadaan'))->with('success', 'pengadaan berhasil ditambahkan');
    }

    public function edit($id_pengadaan)
    {
        $model = new PengadaanModel();
        $data['pengadaan'] = $model->find($id_pengadaan);

        helper('form');
        return view('edit_pengadaan.php', $data);
    }

    public function update()
    {
        $model = new PengadaanModel();

        $data = [
            'id_pengadaan' => $this->request->getVar('id_pengadaan'),
            'tanggal' => $this->request->getVar('tanggal'),
            'nomor_pengadaan' => $this->request->getVar('nomor_pengadaan'),
            'perihal' => $this->request->getVar('perihal'),
            'latar_belakang' => $this->request->getVar('latar_belakang'),
            'permasalahan' => $this->request->getVar('permasalahan'),
            'usulan' => $this->request->getVar('usulan'),
            'pertimbangan' => $this->request->getVar('pertimbangan'),
            'kode_aset' => $this->request->getVar('kode_aset')
        ];

        $id_pengadaan = $this->request->getPost('id_pengadaan');

        $model->update($id_pengadaan, $data);

        // Redirect ke halaman utama pengadaan setelah pembaruan berhasil
        return redirect()->to(base_url('pengadaan'));
    }

    public function delete($id_pengadaan)
    {
        $model = new PengadaanModel();
        $model->delete($id_pengadaan);

        // Redirect ke halaman utama pengadaan setelah penghapusan berhasil
        return redirect()->to(base_url('pengadaan'));
    }

    public function detail($id_pengadaan)
    {
        $model = new PengadaanModel();
        $data['pengadaan'] = $model->find($id_pengadaan);

        helper('form');
        return view('detail_pengadaan.php', $data);
    }


}