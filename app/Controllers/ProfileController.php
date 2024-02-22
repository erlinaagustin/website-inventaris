<?php 
namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\PenggunaModel;
use Myth\Auth\Models\UserModel;

class ProfileController extends BaseController
{
    public function index()
    {
        helper('form');
        $penggunaModel = new PenggunaModel();
        $data['pengguna'] = $penggunaModel->getUsers(user_id());
        // dd($data);

       
        return view('profile', $data);
    }

    // public function update()
    // {
    //     $model = new PenggunaModel();

    //     $data = [
    //         'email' => $this->request->getVar('email'),
    //         'username' => $this->request->getVar('username'),
    //     ];

    //     $id = $this->request->getPost('id');

    //     $model->update($id, $data);

    //     // Redirect ke halaman utama kategori setelah pembaruan berhasil
    //     return redirect()->to(base_url('profil'));
    // }


}