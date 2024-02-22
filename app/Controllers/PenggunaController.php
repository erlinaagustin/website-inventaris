<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PenggunaModel;
use App\Models\AuthGroupModel;
use App\Models\GroupPenggunaModel;
use Myth\Auth\Password;

class PenggunaController extends BaseController
{
    public function index()
    {
        $penggunaModel = new PenggunaModel();
        $data['pengguna'] = $penggunaModel->findAll();

        return view('pengguna', $data);
    }

    public function tambah()
    {
        $groupModel = new AuthGroupModel();
        $data['groups'] = $groupModel->findAll();

        helper('form');
        return view('tambah_akun', $data);
    }

    public function simpan()
    {
        $request = $this->request;

        $data = [
            'email' => $request->getPost('email'),
            'nomor_hp' => $request->getPost('nomor_hp'),
            'username' => $request->getPost('username'),
            'password_hash' => Password::hash($request->getPost('password_hash')),
        ];

        $penggunaModel = new PenggunaModel();
        $penggunaModel->tambahPengguna($data);

        return redirect()->to(base_url('pengguna'));
    }

    public function edit($id)
    {
        $model = new PenggunaModel();
        $data['pengguna'] = $model->find($id);

        helper('form');
        return view('edit_pengguna', $data);
    }

    public function update()
    {
        $model = new PenggunaModel();

        $request = $this->request;

        if ($request->getPost('password_hash') <> '') {
            $data = [
                'email' => $request->getPost('email'),
                'nomor_hp' => $request->getPost('nomor_hp'),
                'username' => $request->getPost('username'),
                'password_hash' => Password::hash($request->getPost('password_hash')),
            ];
        } else {
            $data = [
                'email' => $request->getPost('email'),
                'nomor_hp' => $request->getPost('nomor_hp'),
                'username' => $request->getPost('username')
            ];
        }

        $id = $this->request->getPost('id');

        $model->update($id, $data);

        // Redirect ke halaman utama pengguna setelah pembaruan berhasil
        return redirect()->to(base_url('pengguna'));
    }

    public function delete($id)
    {
        $model = new PenggunaModel();
        $model->delete($id);

        // Redirect ke halaman utama pengguna setelah penghapusan berhasil
        return redirect()->to(base_url('pengguna'));
    }
}
