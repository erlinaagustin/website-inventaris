<?php namespace App\Controllers;

use App\Models\RuanganModel;

class RuanganController extends BaseController
{
    public function index()
    {
        $model = new RuanganModel();
        $data['ruangan'] = $model->findAll();

        return view('ruangan.php', $data);
    }

    public function tambah()
    {
        helper('form');
        return view('tambah_ruangan.php');
    }

    public function simpan()
    {
        $model = new RuanganModel();

        $data = [
            'nama_ruangan' => $this->request->getPost('nama_ruangan'),
            'keterangan' => $this->request->getPost('keterangan')
        ];

        $model->insert($data);

        // Redirect ke halaman utama merek setelah penyimpanan berhasil
        return redirect()->to(base_url('ruangan'));
    }

    public function edit($id_ruangan)
    {
        $model = new RuanganModel();
        $data['ruangan'] = $model->find($id_ruangan);

        helper('form');
        return view('edit_ruangan.php', $data);
    }

    public function update()
    {
        $model = new RuanganModel();

        $data = [
            'nama_ruangan' => $this->request->getPost('nama_ruangan'),
            'keterangan' => $this->request->getPost('keterangan')
        ];

        $id_ruangan = $this->request->getPost('id_ruangan');

        $model->update($id_ruangan, $data);

        // Redirect ke halaman utama ruangan setelah pembaruan berhasil
        return redirect()->to(base_url('ruangan'));
    }

    public function delete($id_ruangan)
    {
        $model = new RuanganModel();
        $model->delete($id_ruangan);

        // Redirect ke halaman utama ruangan setelah penghapusan berhasil
        return redirect()->to(base_url('ruangan'));
    }
}
