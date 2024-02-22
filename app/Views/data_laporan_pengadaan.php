<?php include('layouts/header.php'); ?>
<?php include('layouts/sidebar.php'); ?>
<?php include('layouts/topbar.php'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Laporan Pengadaan Aset</h1>

       <!-- Tambahkan form untuk filter tanggal -->
       <form action="<?= base_url('laporan_pengadaan') ?>" method="get" class="mb-3">
    <div class="row">
        <div class="col-md-3">
            <label for="tanggal_mulai">Tanggal Mulai:</label>
            <input type="date" name="tanggal_mulai" class="form-control" value="<?= esc($tanggalMulai ?? ''); ?>">
        </div>
        <div class="col-md-3">
            <label for="tanggal_akhir">Tanggal Akhir:</label>
            <input type="date" name="tanggal_akhir" class="form-control" value="<?= esc($tanggalAkhir ?? ''); ?>">
        </div>
        <div class="col-md-3">
            <button type="submit" class="btn btn-primary mt-3">Filter</button>
        </div>
        <div class="col-md-3">
            <a href="<?= base_url('laporan_pengadaan/resetFilter'); ?>" class="btn btn-secondary mt-3">Reset</a>
            <a href="<?= base_url('laporan_pengadaan/exportPDF/' . ($tanggalMulai ?? '') . '/' . ($tanggalAkhir ?? '')); ?>" class="btn btn-success mt-3">Export as PDF</a>

        </div>
    </div>
</form>

<!-- Tombol Export PDF -->
<div class="row">
    <div class="col-md-12">
    
    </div>
</div>


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tabel Data Pengadaan Aset</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Aset</th>
                            <th>Jumlah</th>
                            <th>Perkiraan Harga</th>
                            <th>Tanggal</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($laporanPengadaan) && is_array($laporanPengadaan)) : ?>
                            <?php $no = 1; ?>
                            <?php foreach ($laporanPengadaan as $aset) : ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= esc($aset['nama_aset']); ?></td>
                                    <td><?= esc($aset['jumlah']); ?></td>
                                    <td><?= 'Rp ' . number_format($aset['perkiraan_harga'], 0, ',', '.'); ?></td>
                                    <td><?= esc($aset['tanggal']); ?></td>
                                    <td><?= esc($aset['keterangan']); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <tr>
                                <td colspan="7">Tidak ada data pengadaan aset yang diterima.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

<?php include('layouts/footer.php'); ?>
