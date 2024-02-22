<?php namespace App\Controllers;

use App\Models\AsetModel;

class AsetController extends BaseController
{
    public function index()
    {
        $model = new AsetModel();
        $data['aset'] = $model->findAll();

        return view('kebutuhan_aset.php', $data);
    }

    public function tambah()
    {
        helper('form');
        return view('tambah_aset.php');
    }

    public function simpan()
    {
        $model = new AsetModel();
    
        // Mengumpulkan data dari form
        $data = [
            'nama_aset' => $this->request->getVar('nama_aset'),
            'jumlah' => $this->request->getVar('jumlah'),
            'perkiraan_harga' => $this->request->getVar('perkiraan_harga'),
            'tanggal' => $this->request->getVar('tanggal'),
            'status' => null, // Status diatur menjadi NULL secara default
            'keterangan' => $this->request->getVar('keterangan')
        ];
    
        // Validasi data
        if (!$this->validate([
            'nama_aset' => 'required',
            // Tambahkan validasi lain jika diperlukan
        ])) {
            // Kembali ke form dengan input dan pesan error
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
    
        // Menyimpan data ke database
        $model->insert($data);
    
        // Redirect ke halaman utama kebutuhan_aset setelah penyimpanan berhasil
        return redirect()->to(base_url('public/kebutuhan_aset'))->with('success', 'Aset berhasil disimpan');
    }
    

    public function edit($kode_aset)
    {
        $model = new AsetModel();
        $data['aset'] = $model->find($kode_aset);

        helper('form');
        return view('edit_kebutuhan_aset.php', $data);
    }

    public function update()
    {
        $model = new AsetModel();

        $data = [
            'kode_aset' => $this->request->getVar('kode_aset'),
            'nama_aset' => $this->request->getVar('nama_aset'),
            'jumlah' => $this->request->getVar('jumlah'),
            'perkiraan_harga' => $this->request->getVar('perkiraan_harga'),
            'tanggal' => $this->request->getVar('tanggal'),
            'status' => null, // Status diatur menjadi NULL secara default
            'keterangan' => $this->request->getVar('keterangan')
        ];

        $kode_aset = $this->request->getPost('kode_aset');

        $model->update($kode_aset, $data);

        // Redirect ke halaman utama kebutuhan_aset setelah pembaruan berhasil
        return redirect()->to(base_url('public/kebutuhan_aset'));
    }

    public function delete($kode_aset)
    {
        $model = new AsetModel();
        $model->delete($kode_aset);

        // Redirect ke halaman utama kebutuhan_aset setelah penghapusan berhasil
        return redirect()->to(base_url('public/kebutuhan_aset'));
    }



    public function index_atasan()
    {
        $model = new AsetModel();
        $data['aset'] = $model->findAll();

        return view('kebutuhan_aset_atasan.php', $data);
    }


    public function edit_atasan($kode_aset)
    {
        $model = new AsetModel();
        $data['aset'] = $model->find($kode_aset);

        helper('form');
        return view('edit_kebutuhan_aset_atasan.php', $data);
    }

    public function update_atasan()
    {
        $model = new AsetModel();

        $kode_aset = $this->request->getPost('kode_aset');
        $status = $this->request->getPost('status'); // Mengambil nilai status dari form

        $data = [
        
            'status' => $status
        ];

        $model->update($kode_aset, $data);

        // Redirect ke halaman yang diinginkan setelah update
        return redirect()->to('public/kebutuhan_aset_atasan');
    }

}
