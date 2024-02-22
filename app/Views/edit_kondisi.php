<?php include('layouts/header.php'); ?>
<?php include('layouts/sidebar.php'); ?>
<?php include('layouts/topbar.php'); ?>

<div class="container-fluid">
    <?= form_open('kondisi/update', ['method' => 'post']); ?>
        <input type="hidden" name="id_kondisi" value="<?= $kondisi['id_kondisi']; ?>">
        <div class="form-group">
            <label for="nama_kondisi">Nama Kondisi</label>
            <input type="text" class="form-control" id="nama_kondisi" name="nama_kondisi" value="<?= $kondisi['nama_kondisi']; ?>" required>
        </div>
        <div class="form-group">
            <label for="keterangan">Keterangan</label>
            <textarea class="form-control" id="keterangan" name="keterangan"><?= $kondisi['keterangan']; ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    <?= form_close(); ?>
</div>

<?php include('layouts/footer.php'); ?>