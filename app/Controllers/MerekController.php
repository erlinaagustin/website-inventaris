<?php namespace App\Controllers;

use App\Models\MerekModel;

class MerekController extends BaseController
{
    public function index()
    {
        $model = new MerekModel();
        $data['merek'] = $model->findAll();

        return view('merek.php', $data);
    }

    public function tambah()
    {
        helper('form');
        return view('tambah_merek.php');
    }

    public function simpan()
    {
        $model = new MerekModel();

        $data = [
            'nama_merek' => $this->request->getPost('nama_merek'),
            'keterangan' => $this->request->getPost('keterangan')
        ];

        $model->insert($data);

        // Redirect ke halaman utama merek setelah penyimpanan berhasil
        return redirect()->to(base_url('public/merek'));
    }

    public function edit($id_merek)
    {
        $model = new MerekModel();
        $data['merek'] = $model->find($id_merek);

        helper('form');
        return view('edit_merek.php', $data);
    }

    public function update()
    {
        $model = new MerekModel();

        $data = [
            'nama_merek' => $this->request->getPost('nama_merek'),
            'keterangan' => $this->request->getPost('keterangan')
        ];

        $id_merek = $this->request->getPost('id_merek');

        $model->update($id_merek, $data);

        // Redirect ke halaman utama merek setelah pembaruan berhasil
        return redirect()->to(base_url('public/merek'));
    }

    public function delete($id_merek)
    {
        $model = new MerekModel();
        $model->delete($id_merek);

        // Redirect ke halaman utama merek setelah penghapusan berhasil
        return redirect()->to(base_url('public/merek'));
    }
}
