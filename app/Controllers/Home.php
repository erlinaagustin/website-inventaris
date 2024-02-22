<?php

namespace App\Controllers;
use App\Models\AsetModel;
use App\Models\PengolahanAsetModel;
use App\Models\PerbaikanModel;
use App\Models\KategoriModel;

class Home extends BaseController
{
    public function __construct()
    {
        $this->asset = new AsetModel();
        $this->kelola = new PengolahanAsetModel();
        $this->perbaikan = new PerbaikanModel();
        $this->kategory = new KategoriModel();

    }

    public function index(): string
    {
        $assetTotal = $this->kelola->countAllResults();
        $assetTerima = $this->asset->where('status', 'diterima')->countAllResults();
        $assetTolak = $this->asset->where('status', 'ditolak')->countAllResults();
        $assetPerbaikan = $this->perbaikan->where('status', 'belum selesai')->countAllResults();
        $chart = $this->kelola->table('kelola_aset');
        $chart->select('kategori.nama_kategori, SUM(kelola_aset.jumlah) as total_kelola_aset');
        $chart->join('kategori', 'kategori.id_kategori = kelola_aset.id_kategori', 'left');
        $chart->groupBy('kelola_aset.id_kategori');
        $chart = $chart->get()->getResultArray(); 

        $category = [];
        $total = [];
        foreach ($chart as $crt) {
            $category[] = $crt['nama_kategori'];
            $total[] = $crt['total_kelola_aset'];
        }
        $data = [
            'totalAsset' => $assetTotal,
            'terima' => $assetTerima,
            'tolak' => $assetTolak,
            'perbaikan' => $assetPerbaikan,
            'chart' => $chart,
            'category' => '"' . implode('","', $category) . '"',
            'total' => '"' . implode('","', $total) . '"',
        ];
        return view('index', $data);
    }
}
