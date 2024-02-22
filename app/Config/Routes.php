<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');


$routes->get('merek', 'MerekController::index');
$routes->get('merek/tambah', 'MerekController::tambah');
$routes->post('merek/simpan', 'MerekController::simpan');
$routes->get('merek/edit/(:num)', 'MerekController::edit/$1');
$routes->post('merek/update', 'MerekController::update');
$routes->get('merek/delete/(:num)', 'MerekController::delete/$1');

$routes->get('kategori', 'KategoriController::index');
$routes->get('kategori/tambah', 'KategoriController::tambah');
$routes->post('kategori/simpan', 'KategoriController::simpan');
$routes->get('kategori/edit/(:num)', 'KategoriController::edit/$1');
$routes->post('kategori/update', 'KategoriController::update');
$routes->get('kategori/delete/(:num)', 'KategoriController::delete/$1');

$routes->get('ruangan', 'RuanganController::index');
$routes->get('ruangan/tambah', 'RuanganController::tambah');
$routes->post('ruangan/simpan', 'RuanganController::simpan');
$routes->get('ruangan/edit/(:num)', 'RuanganController::edit/$1');
$routes->post('ruangan/update', 'RuanganController::update');
$routes->get('ruangan/delete/(:num)', 'RuanganController::delete/$1');


$routes->get('kondisi', 'KondisiController::index');
$routes->get('kondisi/tambah', 'KondisiController::tambah');
$routes->post('kondisi/simpan', 'KondisiController::simpan');
$routes->get('kondisi/edit/(:num)', 'KondisiController::edit/$1');
$routes->post('kondisi/update', 'KondisiController::update');
$routes->get('kondisi/delete/(:num)', 'KondisiController::delete/$1');

$routes->get('kebutuhan_aset', 'AsetController::index');
$routes->get('kebutuhan_aset/tambah', 'AsetController::tambah');
$routes->post('kebutuhan_aset/simpan', 'AsetController::simpan');
$routes->get('kebutuhan_aset/edit/(:segment)', 'AsetController::edit/$1');
$routes->post('kebutuhan_aset/update', 'AsetController::update');
$routes->get('kebutuhan_aset/delete/(:segment)', 'AsetController::delete/$1');

$routes->get('pengadaan', 'PengadaanController::index');
$routes->get('pengadaan/tambah', 'PengadaanController::tambah');
$routes->post('pengadaan/simpan', 'PengadaanController::simpan');
$routes->get('pengadaan/edit/(:segment)', 'PengadaanController::edit/$1');
$routes->post('pengadaan/update', 'PengadaanController::update');
$routes->get('pengadaan/delete/(:segment)', 'PengadaanController::delete/$1');
$routes->get('pengadaan/detail/(:segment)', 'PengadaanController::detail/$1');

$routes->get('kelola-aset', 'PengolahanAsetController::index');
$routes->get('kelola-aset/tambah', 'PengolahanAsetController::tambah');
$routes->post('kelola-aset/simpan', 'PengolahanAsetController::simpan');
$routes->get('kelola-aset/detail/(:num)', 'PengolahanAsetController::detail/$1');
$routes->get('kelola-aset/generate-pdf', 'PengolahanAsetController::generatePdf');
$routes->get('kelola-aset/edit/(:num)', 'PengolahanAsetController::edit/$1');
$routes->post('kelola-aset/update', 'PengolahanAsetController::update');
$routes->post('kelola-aset/nonaktifkan', 'PengolahanAsetController::nonaktifkan', ['as' => 'nonaktifkan']);
$routes->get('kelola-aset/delete/(:num)', 'PengolahanAsetController::delete/$1');

$routes->get('kebutuhan_aset_atasan', 'AsetController::index_atasan');
$routes->get('kebutuhan_aset_atasan/edit_atasan/(:segment)', 'AsetController::edit_atasan/$1');
$routes->post('kebutuhan_aset_atasan/update_atasan', 'AsetController::update_atasan');
$routes->get('kebutuhan_aset/delete/(:segment)', 'AsetController::delete/$1');

$routes->get('aset_nonaktif', 'AsetNonAktifController::index');
$routes->get('aset_nonaktif/detail/(:num)', 'AsetNonAktifController::detail/$1');
$routes->get('aset_nonaktif/delete/(:any)', 'AsetNonAktifController::delete/$1');

$routes->get('laporan_perbaikan', 'LaporanPerbaikanController::index');
$routes->get('laporan_perbaikan/tambah', 'LaporanPerbaikanController::tambah');
$routes->post('laporan_perbaikan/simpan', 'LaporanPerbaikanController::simpan');
$routes->get('laporan_perbaikan/edit/(:num)', 'LaporanPerbaikanController::edit/$1');
$routes->post('laporan_perbaikan/update', 'LaporanPerbaikanController::update');
$routes->get('laporan_perbaikan/delete/(:segment)', 'LaporanPerbaikanController::delete/$1');

$routes->get('data_laporan_perbaikan', 'DataLaporanPerbaikanController::index');
$routes->get('data_laporan_perbaikan/resetFilter', 'DataLaporanPerbaikanController::resetFilter');
$routes->get('data_laporan_perbaikan/exportPDF', 'DataLaporanPerbaikanController::exportPDF');
$routes->get('data_laporan_perbaikan/exportPDF/(:segment)/(:segment)/(:segment)', 'DataLaporanPerbaikanController::exportPDF/$1/$2/$3');

$routes->get('laporan_pengadaan', 'LaporanPengadaanController::index');
$routes->get('laporan_pengadaan/resetFilter', 'LaporanPengadaanController::resetFilter');
$routes->get('laporan_pengadaan/exportPDF', 'LaporanPengadaanController::exportPDF');
$routes->get('laporan_pengadaan/exportPDF/(:segment)/(:segment)', 'LaporanPengadaanController::exportPDF/$1/$2');

$routes->get('laporan_aset', 'LaporanAsetController::index');
$routes->get('laporan_aset/resetFilter', 'LaporanAsetController::resetFilter');
$routes->get('laporan_aset/exportPDF', 'LaporanAsetController::exportPDF');
$routes->get('laporan_aset/exportPDF/(:segment)/(:segment)', 'LaporanAsetController::exportPDF/$1/$2');

$routes->get('laporan_aset_nonaktif', 'LaporanAsetNonaktifController::index');
$routes->get('laporan_aset_nonaktif/resetFilter', 'LaporanAsetNonaktifController::resetFilter');
$routes->get('laporan_aset_nonaktif/exportPDF', 'LaporanAsetNonaktifController::exportPDF');
$routes->get('laporan_aset_nonaktif/exportPDF/(:segment)/(:segment)', 'LaporanAsetNonaktifController::exportPDF/$1/$2');

$routes->get('laporan_aset_nonaktif', 'LaporanAsetNonaktifController::index');
$routes->get('laporan_aset_nonaktif/resetFilter', 'LaporanAsetNonaktifController::resetFilter');
$routes->get('laporan_aset_nonaktif/exportPDF', 'LaporanAsetNonaktifController::exportPDF');


$routes->get('profil', 'ProfileController::index');

$routes->get('pengguna', 'PenggunaController::index');
$routes->get('pengguna/tambah', 'PenggunaController::tambah');
$routes->post('pengguna/simpan', 'PenggunaController::simpan');
$routes->get('pengguna/edit/(:num)', 'PenggunaController::edit/$1');
$routes->post('pengguna/update', 'PenggunaController::update');
$routes->get('pengguna/delete/(:num)', 'PenggunaController::delete/$1');

$routes->group('admin', ['filter' => 'role:admin'], function ($routes) {
    // Rute-rute yang memerlukan peran "admin"
    $routes->add('pengguna/tambah-akun', 'PenggunaController::tambahAkun');
    $routes->post('pengguna/simpan-akun', 'PenggunaController::simpanAkun');
});