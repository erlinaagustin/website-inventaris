<?php include('layouts/header.php'); ?>
<?php include('layouts/sidebar.php'); ?>
<?php include('layouts/topbar.php'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Laporan Perbaikan</h1>

    <!-- Tambahkan form untuk filter tanggal -->
<form action="<?= base_url('data_laporan_perbaikan') ?>" method="get" class="mb-3">
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
    <label for="status">Status:</label>
    <select name="status" class="form-control">
        <option value="semua">Semua Status</option>
        <option value="Selesai">Selesai</option>
        <option value="Proses">Proses</option>
        <option value="Belum Selesai">Belum Selesai</option>
        <!-- Tambahkan opsi lain sesuai dengan status yang ada -->
    </select>
</div>
    <div class="row">
    <div class="col-md-3">
        <button type="submit" class="btn btn-primary mt-3">Filter</button>
    </div>
    <div class="col-md-3">
        <a href="<?= base_url('data_laporan_perbaikan/resetFilter'); ?>" class="btn btn-secondary mt-3">Reset</a>
    </div>
    <div class="col-md-6">
    <?php
    if (empty($tanggalMulai) && empty($tanggalAkhir) && empty($status)) {
        $tanggalMulai = 0;
        $tanggalAkhir = 0;
        $status = 'semua';
    } elseif (empty($tanggalMulai) && empty($tanggalAkhir) && !empty($status)) {
        $tanggalMulai = 0;
        $tanggalAkhir = 0;
    }
    $exportUrl = base_url("data_laporan_perbaikan/exportPDF/$tanggalMulai/$tanggalAkhir/$status");
    ?>
    <a href="<?= $exportUrl; ?>" class="btn btn-success mt-3" target="_blank">Export as PDF</a>
</div>


    </div>
</form>




    <!-- Tombol Tambah Data -->
    <!-- <a href="<?= base_url('public/laporan_perbaikan/tambah'); ?>" class="btn btn-primary mb-2">+ Tambah</a> -->

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tabel Data Perbaikan</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Aset</th>
                            <th>Kode Aset</th>
                            <th>Kerusakan</th>
                            <th>Tanggal Perbaikan</th>
                            <th>Jumlah</th>
                            <th>Status</th>
                            <th>Keterangan</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($laporanPerbaikan) && is_array($laporanPerbaikan)) : ?>
                            <?php $no = 1; ?>
                            <?php foreach ($laporanPerbaikan as $perbaikan) : ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= esc($perbaikan['nama_aset']); ?></td>
                                    <td><?= esc($perbaikan['kode_aset']); ?></td>
                                    <td><?= esc($perbaikan['kerusakan']); ?></td>
                                    <td><?= esc($perbaikan['tanggal_perbaikan']); ?></td>
                                    <td><?= esc($perbaikan['jumlah']); ?></td>
                                    <td><?= esc($perbaikan['status']); ?></td>
                                    <td><?= esc($perbaikan['keterangan']); ?></td>
                                   
                                </tr>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <tr>
                                <td colspan="9">Tidak ada data perbaikan.</td>
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
