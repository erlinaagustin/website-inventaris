<?php namespace App\Controllers;

use App\Models\AsetNonAktifModel;

class AsetNonAktifController extends BaseController
{

public function index()
{
    $model = new AsetNonAktifModel();
    $data['aset_nonaktif'] = $model->getAsetNonAktifWithDetails();

    return view('aset_nonaktif.php', $data);
}




    public function detail($id)
    {
        $model = new AsetNonAktifModel();
        
        // Mengambil data aset berdasarkan ID
        $data['aset'] = $model->getAsetNonAktifWithDetails($id);

        // Jika data aset tidak ditemukan, redirect ke halaman daftar aset dengan pesan error
        if (empty($data['aset'])) {
            return redirect()->to('/aset_nonaktif')->with('error', 'Aset tidak ditemukan.');
        }

        // Menampilkan view dengan data aset
        return view('detail_aset_nonaktif', $data);
    }

    public function delete($kode_aset_nonaktif)
    {
        $model = new AsetNonAktifModel();
        $model->delete($kode_aset_nonaktif);

        // Redirect ke halaman utama kategori setelah penghapusan berhasil
        return redirect()->to(base_url('aset_nonaktif'));
    }


}
