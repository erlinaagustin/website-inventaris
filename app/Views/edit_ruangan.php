<?php include('layouts/header.php'); ?>
<?php include('layouts/sidebar.php'); ?>
<?php include('layouts/topbar.php'); ?>

<div class="container-fluid">
    <?= form_open('ruangan/update', ['method' => 'post']); ?>
        <input type="hidden" name="id_ruangan" value="<?= $ruangan['id_ruangan']; ?>">
        <div class="form-group">
            <label for="nama_ruangan">Nama Ruangan</label>
            <input type="text" class="form-control" id="nama_ruangan" name="nama_ruangan" value="<?= $ruangan['nama_ruangan']; ?>" required>
        </div>
        <div class="form-group">
            <label for="keterangan">Keterangan</label>
            <textarea class="form-control" id="keterangan" name="keterangan"><?= $ruangan['keterangan']; ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    <?= form_close(); ?>
</div>

<?php include('layouts/footer.php'); ?>