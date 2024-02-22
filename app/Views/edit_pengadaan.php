<?php include('layouts/header.php'); ?>
<?php include('layouts/sidebar.php'); ?>
<?php include('layouts/topbar.php'); ?>

<div class="container-fluid">
    <?= form_open('pengadaan/update', ['method' => 'post']); ?>
        <input type="hidden" name="id_pengadaan" value="<?= $pengadaan['id_pengadaan']; ?>">

        <div class="form-group">
            <label for="tanggal">Tanggal</label>
            <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?= $pengadaan['tanggal']; ?>" required>
        </div>

        <div class="form-group">
            <label for="nomor_pengadaan">Nomor Pengadaan</label>
            <input type="text" class="form-control" id="nomor_pengadaan" name="nomor_pengadaan" value="<?= $pengadaan['nomor_pengadaan']; ?>" required>
        </div>

        <div class="form-group">
            <label for="perihal">Perihal</label>
            <input type="text" class="form-control" id="perihal" name="perihal" value="<?= $pengadaan['perihal']; ?>" required>
        </div>

        <div class="form-group">
            <label for="latar_belakang">Latar Belakang</label>
            <textarea class="form-control" id="latar_belakang" name="latar_belakang"><?= $pengadaan['latar_belakang']; ?></textarea>
        </div>

        <div class="form-group">
            <label for="permasalahan">Permasalahan</label>
            <textarea class="form-control" id="permasalahan" name="permasalahan"><?= $pengadaan['permasalahan']; ?></textarea>
        </div>

        <div class="form-group">
            <label for="usulan">Usulan</label>
            <textarea class="form-control" id="usulan" name="usulan"><?= $pengadaan['usulan']; ?></textarea>
        </div>

        <div class="form-group">
            <label for="pertimbangan">Pertimbangan</label>
            <textarea class="form-control" id="pertimbangan" name="pertimbangan"><?= $pengadaan['pertimbangan']; ?></textarea>
        </div>

        <div class="form-group">
            <label for="kode_aset">Kode Aset</label>
            <input type="text" class="form-control" id="kode_aset" name="kode_aset" value="<?= $pengadaan['kode_aset']; ?>" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    <?= form_close(); ?>
</div>


<?php include('layouts/footer.php'); ?>