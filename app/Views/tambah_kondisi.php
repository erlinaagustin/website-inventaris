<?php include('layouts/header.php'); ?>
<?php include('layouts/sidebar.php'); ?>
<?php include('layouts/topbar.php'); ?>

<div class="container-fluid">
    <?= form_open('kondisi/simpan', ['method' => 'post']); ?>
        <div class="form-group">
            <label for="nama_kondisi">Nama Kondisi</label>
            <input type="text" class="form-control" id="nama_kondisi" name="nama_kondisi" required>
        </div>
        <div class="form-group">
            <label for="keterangan">Keterangan</label>
            <textarea class="form-control" id="keterangan" name="keterangan"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    <?= form_close(); ?>
</div>


<?php include('layouts/footer.php'); ?>