<?php namespace App\Controllers;

use App\Models\PengolahanAsetModel;
use App\Models\KategoriModel;
use App\Models\RuanganModel;
use App\Models\MerekModel;
use App\Models\KondisiModel;
use App\Models\AsetModel;
use Dompdf\Dompdf;
use Dompdf\Options;
use App\Models\AsetNonaktifModel;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;



class PengolahanAsetController extends BaseController
{
    public function index()
    {
        $model = new PengolahanAsetModel();
        $data['aset'] = $model->getAsetWithDetails();

        return view('pengolahan_aset.php', $data);
    }

    public function tambah()
    {
        helper('form');

        $asetModel = new AsetModel();
        $kategoriModel = new KategoriModel();
        $ruanganModel = new RuanganModel();
        $merekModel = new MerekModel();
        $kondisiModel = new KondisiModel();

        $data['aset'] = $asetModel->findAll();
        $data['kategori'] = $kategoriModel->findAll();
        $data['ruangan'] = $ruanganModel->findAll();
        $data['merek'] = $merekModel->findAll();
        $data['kondisi'] = $kondisiModel->findAll();

        return view('tambah_pengolahan_aset', $data);
    }

    public function simpan()
{
    helper(['form', 'url']);

    $image = $this->request->getFile('image');
    $newName = '';

    // Cek apakah gambar valid dan belum dipindahkan
    if ($image->isValid() && !$image->hasMoved()) {
        $newName = $image->getRandomName(); // Generate nama file acak
        $image->move("uploads", $newName); // Pindahkan file ke direktori 'uploads'
    }
   

    $data = [
        'kode_aset' => $this->request->getVar('kode_aset'),
        'nama_aset' => $this->request->getVar('nama_aset'),
        'harga'     => $this->request->getVar('harga'),
        'jumlah'    => $this->request->getVar('jumlah'),
        'id_kategori' => $this->request->getVar('id_kategori'),
        'id_ruangan' => $this->request->getVar('id_ruangan'),
        'id_merek' => $this->request->getVar('id_merek'),
        'id_kondisi' => $this->request->getVar('id_kondisi'),
        'tanggal' => $this->request->getVar('tanggal'),
        'keterangan' => $this->request->getVar('keterangan'),
        'foto' => $newName,
    ];

    // Panggil model PengolahanAsetModel
    $pengolahanAsetModel = new PengolahanAsetModel();

    // Panggil fungsi insert yang sudah dimodifikasi untuk menambahkan QR Code
    if ($pengolahanAsetModel->insert($data) === false) {
        // Jika ada kesalahan validasi, tampilkan kembali form dengan kesalahan
        return redirect()->back()->withInput()->with('errors', $pengolahanAsetModel->errors());
    } else {
        $id = $pengolahanAsetModel->getInsertID();
        $writer = new PngWriter();
        $kode_aset = $this->request->getVar('kode_aset');
        $qrCode = QrCode::create(base_url('kelola-aset/detail/'.$id));
        $result = $writer->write($qrCode);
        $pathQr = "qr_code/$kode_aset.png";
        $result->saveToFile($pathQr);
        $pengolahanAsetModel->update($id, ['qr_code' => $pathQr]);
        // Jika berhasil, redirect ke halaman yang diinginkan dengan pesan sukses
        return redirect()->to('/kelola-aset')->with('success', 'Data berhasil disimpan');
    }
}


    public function detail($id)
    {
        $model = new PengolahanAsetModel();
        
        // Mengambil data aset berdasarkan ID
        $data['aset'] = $model->getAsetWithDetails($id);

        // Jika data aset tidak ditemukan, redirect ke halaman daftar aset dengan pesan error
        if (empty($data['aset'])) {
            return redirect()->to('/kelola-aset')->with('error', 'Aset tidak ditemukan.');
        }

        // Menampilkan view dengan data aset
        return view('detail_pengolahan_aset', $data);
    }

    public function edit($id_kelola)
    {
        $model = new PengolahanAsetModel();
        $data['kelola_aset'] = $model->getAsetWithDetails($id_kelola);


        $asetModel = new AsetModel();
        $kategoriModel = new KategoriModel();
        $ruanganModel = new RuanganModel();
        $merekModel = new MerekModel();
        $kondisiModel = new KondisiModel();

        $data['aset'] = $asetModel->findAll();
        $data['kategori'] = $kategoriModel->findAll();
        $data['ruangan'] = $ruanganModel->findAll();
        $data['merek'] = $merekModel->findAll();
        $data['kondisi'] = $kondisiModel->findAll();

        helper('form');
        return view('edit_pengolahan_aset.php', $data);
    }

    public function update()
{
    $id_kelola = $this->request->getPost('id_kelola');
    
    $image = $this->request->getFile('image');
    $newName = '';

    // Cek apakah ada foto yang diunggah
    if ($image->isValid() && !$image->hasMoved()) {
        $newName = $image->getRandomName();
        $image->move("uploads", $newName);
    }

    $data = [
        'kode_aset' => $this->request->getPost('kode_aset'),
        'nama_aset' => $this->request->getPost('nama_aset'),
        'harga' => $this->request->getPost('harga'),
        'jumlah' => $this->request->getPost('jumlah'),
        'id_kategori' => $this->request->getPost('id_kategori'),
        'id_ruangan' => $this->request->getPost('id_ruangan'),
        'id_merek' => $this->request->getPost('id_merek'),
        'id_kondisi' => $this->request->getPost('id_kondisi'),
        'tanggal' => $this->request->getPost('tanggal'),
        'keterangan' => $this->request->getPost('keterangan'),
    ];

    // Jika ada foto baru, tambahkan ke data
    if (!empty($newName)) {
        $data['foto'] = $newName;
    }
    $pengolahanAsetModel = new PengolahanAsetModel();

    // Gunakan klausa where untuk menentukan record yang akan diupdate
    $result = $pengolahanAsetModel->update($id_kelola,$data);

    if ($result === false) {
        return redirect()->back()->withInput()->with('errors', $pengolahanAsetModel->errors());
    } else {
        return redirect()->to('/kelola-aset')->with('success', 'Data berhasil diupdate');
    }
}


    

    public function nonaktifkan()
    {
        $id_kelola = $this->request->getPost('id_kelola');
    
        // Ambil data aset berdasarkan ID
        $model = new PengolahanAsetModel();
        $aset = $model->find($id_kelola);
    
        // Tambahkan tanggal nonaktif
        $tanggal_nonaktif = date('Y-m-d H:i:s');
    
        // Pindahkan ke tabel aset_nonaktif
        $nonaktifModel = new AsetNonaktifModel();
        $nonaktifModel->insert([
            'id_kelola' => $aset['id_kelola'],
            'kode_aset' => $aset['kode_aset'],
            'nama_aset' => $aset['nama_aset'],
            'jumlah'    => $aset['jumlah'],
            'harga'     => $aset['harga'],
            'id_kategori' => $aset['id_kategori'],
            'id_ruangan' => $aset['id_ruangan'],
            'id_merek' => $aset['id_merek'],
            'id_kondisi' => $aset['id_kondisi'],
            'tanggal_nonaktif' => $tanggal_nonaktif,
            'foto' => $aset['foto'],
        ]);

        $id = $nonaktifModel->getInsertID();
        $writer = new PngWriter();
        $kode_aset = $aset['kode_aset'];
        $qrCode = QrCode::create(base_url('aset_nonaktif/detail/'.$id));
        $result = $writer->write($qrCode);
        $pathQr = "qr_code/$kode_aset.png";
        $result->saveToFile($pathQr);
        $nonaktifModel->update($id, ['qr_code' => $pathQr]);
    
        // Hapus aset dari tabel pengolahan aset
        $model->delete($id_kelola);
    
        return redirect()->to('/kelola-aset')->with('success', 'Aset berhasil dinonaktifkan pada ' . $tanggal_nonaktif);
    }
    

    public function delete($id_kelola)
    {
        $model = new PengolahanAsetModel();
        $model->delete($id_kelola);

        // Redirect ke halaman utama kelola aset setelah penghapusan berhasil
        return redirect()->to(base_url('kelola-aset'));
    }
    


}
