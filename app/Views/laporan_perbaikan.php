<?php include('layouts/header.php'); ?>
<?php include('layouts/sidebar.php'); ?>
<?php include('layouts/topbar.php'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Perbaikan</h1>

    <!-- Tombol Tambah Data -->
    <a href="<?= base_url('laporan_perbaikan/tambah'); ?>" class="btn btn-primary mb-2">+ Tambah</a>

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
                            <th>Action</th>
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
                                    <td>
                                        <a href="laporan_perbaikan/edit/<?= $perbaikan['id_perbaikan']; ?>"><i class="fas fa-edit"></i></a>
                                        &nbsp;
                                        <a href="laporan_perbaikan/delete/<?= $perbaikan['id_perbaikan']; ?>"><i class="fas fa-trash-alt"></i></a>
                                    </td>
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
