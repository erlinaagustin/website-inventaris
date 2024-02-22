<?php include('layouts/header.php'); ?>
<?php include('layouts/sidebar.php'); ?>
<?php include('layouts/topbar.php'); ?>

<div class="container-fluid">
    <?= form_open('pengadaan/simpan', ['method' => 'post']); ?>
    <div class="form-group">
            <label for="id_pengadaan">ID Pengadaan</label>
            <input type="text" class="form-control" id="id_pengadaan" name="id_pengadaan" required>
        </div>
    <!-- Field Kode Aset (Read-Only) -->
        <div class="form-group">
            <label for="kode_aset">Kode Aset</label>
            <select class="form-control" id="kode_aset" name="kode_aset">
                <?php foreach ($asetList as $aset): ?>
                    <option value="<?= esc($aset['kode_aset']); ?>"><?= esc($aset['kode_aset']); ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <label for="tanggal">Tanggal</label>
            <input type="date" class="form-control" id="tanggal" name="tanggal" required>
        </div>
        <div class="form-group">
            <label for="nomor_pengadaan">Nomor Pengadaan</label>
            <input type="text" class="form-control" id="nomor_pengadaan" name="nomor_pengadaan" required>
        </div>
        <div class="form-group">
            <label for="perihal">Perihal</label>
            <input type="text" class="form-control" id="perihal" name="perihal" required>
        </div>
        <div class="form-group">
            <label for="latar_belakang">Latar Belakang</label>
            <textarea class="form-control" id="latar_belakang" name="latar_belakang"></textarea>
        </div>
        <div class="form-group">
            <label for="permasalahan">Permasalahan</label>
            <textarea class="form-control" id="permasalahan" name="permasalahan"></textarea>
        </div>
        <div class="form-group">
            <label for="usulan">Usulan</label>
            <textarea class="form-control" id="usulan" name="usulan"></textarea>
        </div>
        <div class="form-group">
            <label for="pertimbangan">Pertimbangan</label>
            <textarea class="form-control" id="pertimbangan" name="pertimbangan"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    <?= form_close(); ?>
</div>

<?php include('layouts/footer.php'); ?>
