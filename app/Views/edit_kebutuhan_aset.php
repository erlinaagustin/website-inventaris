<?php include('layouts/header.php'); ?>
<?php include('layouts/sidebar.php'); ?>
<?php include('layouts/topbar.php'); ?>

<div class="container-fluid">
    <?= form_open('kebutuhan_aset/update', ['method' => 'post']); ?>
        <input type="hidden" name="kode_aset" value="<?= $aset['kode_aset']; ?>">
        <div class="form-group">
            <label for="nama_aset">Nama Aset</label>
            <input type="text" class="form-control" id="nama_aset" name="nama_aset" value="<?= $aset['nama_aset']; ?>" required>
        </div>
        <div class="form-group">
            <label for="jumlah">Jumlah</label>
            <input type="number" class="form-control" id="jumlah" name="jumlah" value="<?= $aset['jumlah']; ?>">
        </div>
        <div class="form-group">
            <label for="perkiraan_harga">Perkiraan Harga</label>
            <input type="text" class="form-control" id="perkiraan_harga" name="perkiraan_harga" value="<?= $aset['perkiraan_harga']; ?>">
        </div>
        <div class="form-group">
            <label for="tanggal">Tanggal</label>
            <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?= $aset['tanggal']; ?>">
        </div>
        <div class="form-group">
            <label for="keterangan">Keterangan</label>
            <textarea class="form-control" id="keterangan" name="keterangan"><?= $aset['keterangan']; ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    <?= form_close(); ?>
</div>

<?php include('layouts/footer.php'); ?>
