<!-- app/Views/edit_perbaikan.php -->

<?php include('layouts/header.php'); ?>
<?php include('layouts/sidebar.php'); ?>
<?php include('layouts/topbar.php'); ?>

<div class="container-fluid">
    <?= form_open('laporan_perbaikan/update', ['method' => 'post']); ?>
        <input type="hidden" name="id_perbaikan" value="<?= $perbaikan['id_perbaikan']; ?>">

        <div class="form-group">
            <label for="kerusakan">Kerusakan</label>
            <input type="text" class="form-control" id="kerusakan" name="kerusakan" value="<?= $perbaikan['kerusakan']; ?>" required>
        </div>

        <div class="form-group">
            <label for="tanggal_perbaikan">Tanggal Perbaikan</label>
            <input type="date" class="form-control" id="tanggal_perbaikan" name="tanggal_perbaikan" value="<?= $perbaikan['tanggal_perbaikan']; ?>" required>
        </div>

        <div class="form-group">
            <label for="jumlah">Jumlah</label>
            <input type="number" class="form-control" id="jumlah" name="jumlah" value="<?= $perbaikan['jumlah']; ?>" required>
        </div>

        <div class="form-group">
            <label for="status">Status</label>
            <select class="form-control" id="status" name="status" required>
                <option value="Selesai" <?= ($perbaikan['status'] == 'Selesai') ? 'selected' : ''; ?>>Selesai</option>
                <option value="Proses" <?= ($perbaikan['status'] == 'Proses') ? 'selected' : ''; ?>>Proses</option>
                <option value="Belum Dikerjakan" <?= ($perbaikan['status'] == 'Belum Dikerjakan') ? 'selected' : ''; ?>>Belum Dikerjakan</option>
            </select>
        </div>

        <div class="form-group">
            <label for="keterangan">Keterangan</label>
            <textarea class="form-control" id="keterangan" name="keterangan"><?= $perbaikan['keterangan']; ?></textarea>
        </div>

        <div class="form-group">
            <label for="kode_aset">Kode Aset</label>
            <select class="form-control" id="kode_aset" name="kode_aset" required>
                <?php foreach ($asetOptions as $aset) : ?>
                    <option value="<?= $aset['kode_aset']; ?>" <?= ($aset['kode_aset'] == $perbaikan['kode_aset']) ? 'selected' : ''; ?>>
                        <?= $aset['kode_aset'] . ' - ' . $aset['nama_aset']; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    <?= form_close(); ?>
</div>

<?php include('layouts/footer.php'); ?>
