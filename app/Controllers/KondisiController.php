<?php namespace App\Controllers;

use App\Models\KondisiModel;

class KondisiController extends BaseController
{
    public function index()
    {
        $model = new KondisiModel();
        $data['kondisi'] = $model->findAll();

        return view('kondisi.php', $data);
    }

    public function tambah()
    {
        helper('form');
        return view('tambah_kondisi.php');
    }

    public function simpan()
    {
        $model = new KondisiModel();

        $data = [
            'nama_kondisi' => $this->request->getPost('nama_kondisi'),
            'keterangan' => $this->request->getPost('keterangan')
        ];

        $model->insert($data);

        // Redirect ke halaman utama kondisi setelah penyimpanan berhasil
        return redirect()->to(base_url('kondisi'));
    }

    public function edit($id_kondisi)
    {
        $model = new KondisiModel();
        $data['kondisi'] = $model->find($id_kondisi);

        helper('form');
        return view('edit_kondisi.php', $data);
    }

    public function update()
    {
        $model = new KondisiModel();

        $data = [
            'nama_kondisi' => $this->request->getPost('nama_kondisi'),
            'keterangan' => $this->request->getPost('keterangan')
        ];

        $id_kondisi = $this->request->getPost('id_kondisi');

        $model->update($id_kondisi, $data);

        // Redirect ke halaman utama kondisi setelah pembaruan berhasil
        return redirect()->to(base_url('kondisi'));
    }

    public function delete($id_kondisi)
    {
        $model = new KondisiModel();
        $model->delete($id_kondisi);

        // Redirect ke halaman utama kondisi setelah penghapusan berhasil
        return redirect()->to(base_url('kondisi'));
    }
}
