<?php include('layouts/header.php'); ?>
<?php include('layouts/sidebar.php'); ?>
<?php include('layouts/topbar.php'); ?>

<div class="container-fluid">
    <?= form_open('kategori/update', ['method' => 'post']); ?>
        <input type="hidden" name="id_kategori" value="<?= $kategori['id_kategori']; ?>">
        <div class="form-group">
            <label for="nama_kondisi">Nama Kategori</label>
            <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" value="<?= $kategori['nama_kategori']; ?>" required>
        </div>
        <div class="form-group">
            <label for="keterangan">Keterangan</label>
            <textarea class="form-control" id="keterangan" name="keterangan"><?= $kategori['keterangan']; ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    <?= form_close(); ?>
</div>

<?php include('layouts/footer.php'); ?>