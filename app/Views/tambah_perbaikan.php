
<?php include('layouts/header.php'); ?>
<?php include('layouts/sidebar.php'); ?>
<?php include('layouts/topbar.php'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tambah Data Perbaikan</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Tambah Data Perbaikan</h6>
        </div>
        <div class="card-body">
            <form action="<?= base_url('laporan_perbaikan/simpan'); ?>" method="post">
                <!-- Isi form disini sesuai dengan struktur data perbaikan -->

                <div class="form-group">
                    <label for="kode_aset">Aset:</label>
                    <select class="form-control" id="kode_aset" name="kode_aset" required>
                        <?php foreach ($asetOptions as $aset) : ?>
                            <option value="<?= $aset['kode_aset']; ?>"><?= $aset['kode_aset'] . ' - ' . $aset['nama_aset']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="kerusakan">Kerusakan:</label>
                    <textarea class="form-control" id="kerusakan" name="kerusakan" required></textarea>
                </div>
                <div class="form-group">
                    <label for="tanggal_perbaikan">Tanggal Perbaikan:</label>
                    <input type="date" class="form-control" id="tanggal_perbaikan" name="tanggal_perbaikan" required>
                </div>
                <div class="form-group">
                    <label for="jumlah">Jumlah:</label>
                    <input type="number" class="form-control" id="jumlah" name="jumlah" required>
                </div>
                <div class="form-group">
                    <label for="status">Status:</label>
                    <select class="form-control" id="status" name="status" required>
                        <option value="Selesai">Selesai</option>
                        <option value="Proses">Proses</option>
                        <option value="Belum Dikerjakan">Belum Dikerjakan</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="keterangan">Keterangan:</label>
                    <textarea class="form-control" id="keterangan" name="keterangan"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

<?php include('layouts/footer.php'); ?>
