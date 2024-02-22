<?php namespace App\Controllers;

use App\Models\KategoriModel;

class KategoriController extends BaseController
{
    public function index()
    {
        $model = new KategoriModel();
        $data['kategori'] = $model->findAll();

        return view('kategori.php', $data);
    }

    public function tambah()
    {
        helper('form');
        return view('tambah_kategori.php');
    }

    public function simpan()
    {
        $model = new KategoriModel();

        $data = [
            'nama_kategori' => $this->request->getPost('nama_kategori'),
            'keterangan' => $this->request->getPost('keterangan')
        ];

        $model->insert($data);

        // Redirect ke halaman utama kategori setelah penyimpanan berhasil
        return redirect()->to(base_url('kategori'));
    }

    public function edit($id_kategori)
    {
        $model = new KategoriModel();
        $data['kategori'] = $model->find($id_kategori);

        helper('form');
        return view('edit_kategori.php', $data);
    }

    public function update()
    {
        $model = new KategoriModel();

        $data = [
            'nama_kategori' => $this->request->getPost('nama_kategori'),
            'keterangan' => $this->request->getPost('keterangan')
        ];

        $id_kategori = $this->request->getPost('id_kategori');

        $model->update($id_kategori, $data);

        // Redirect ke halaman utama kategori setelah pembaruan berhasil
        return redirect()->to(base_url('kategori'));
    }

    public function delete($id_kategori)
    {
        $model = new KategoriModel();
        $model->delete($id_kategori);

        // Redirect ke halaman utama kategori setelah penghapusan berhasil
        return redirect()->to(base_url('kategori'));
    }


}
