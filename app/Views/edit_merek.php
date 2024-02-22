<?php include('layouts/header.php'); ?>
<?php include('layouts/sidebar.php'); ?>
<?php include('layouts/topbar.php'); ?>

<div class="container-fluid">
    <?= form_open('merek/update', ['method' => 'post']); ?>
        <input type="hidden" name="id_merek" value="<?= $merek['id_merek']; ?>">
        <div class="form-group">
            <label for="nama_merek">Nama Merek</label>
            <input type="text" class="form-control" id="nama_merek" name="nama_merek" value="<?= $merek['nama_merek']; ?>" required>
        </div>
        <div class="form-group">
            <label for="keterangan">Keterangan</label>
            <textarea class="form-control" id="keterangan" name="keterangan"><?= $merek['keterangan']; ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    <?= form_close(); ?>
</div>

<?php include('layouts/footer.php'); ?>