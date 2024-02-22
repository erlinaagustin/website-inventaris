<?php include('layouts/header.php'); ?>
<?php include('layouts/sidebar.php'); ?>
<?php include('layouts/topbar.php'); ?>

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tambah Aset</h6>
        </div>
        <div class="card-body">
            <?php if (session()->getFlashdata('error')): ?>
                <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
            <?php endif; ?>

            <form action="<?= base_url('kelola-aset/simpan') ?>" method="POST" enctype="multipart/form-data">
                <?= csrf_field() ?>

                <!-- <div class="form-group col-sm-4">
                    <label for="id_kelola">ID Kelola</label>
                    <input type="text" class="form-control" id="id_kelola" name="id_kelola" required>
                </div> -->
                <div class="form-group">
                    <label for="kode_aset">Kode Aset</label>
                    <input type="text" class="form-control" name="kode_aset" id="kode_aset" required>
                </div>
                <div class="form-group">
                    <label for="nama_aset">Nama Aset</label>
                    <input type="text" class="form-control" name="nama_aset" id="nama_aset" required>
                </div>
                <div class="form-group">
                    <label for="harga">Harga</label>
                    <input type="text" class="form-control" name="harga" id="harga" required>
                </div>
                <div class="form-group">
                    <label for="harga">Jumlah</label>
                    <input type="text" class="form-control" name="jumlah" id="jumlah" required>
                </div>
                <div class="form-group">
                    <label for="id_kategori">Kategori</label>
                    <select class="form-control" id="id_kategori" name="id_kategori">
                        <?php foreach($kategori as $item): ?>
                            <option value="<?= $item['id_kategori']; ?>"><?= $item['nama_kategori']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="id_ruangan">Ruangan</label>
                    <select class="form-control" id="id_ruangan" name="id_ruangan">
                        <?php foreach($ruangan as $item): ?>
                            <option value="<?= $item['id_ruangan']; ?>"><?= $item['nama_ruangan']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="id_merek">Merek</label>
                    <select class="form-control" id="id_merek" name="id_merek">
                        <?php foreach($merek as $item): ?>
                            <option value="<?= $item['id_merek']; ?>"><?= $item['nama_merek']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="id_kondisi">Kondisi</label>
                    <select class="form-control" id="id_kondisi" name="id_kondisi">
                        <?php foreach($kondisi as $item): ?>
                            <option value="<?= $item['id_kondisi']; ?>"><?= $item['nama_kondisi']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="tanggal">Tanggal</label>
                    <input type="date" class="form-control" id="tanggal" name="tanggal">
                </div>

                <div class="form-group">
                    <label for="keterangan">Keterangan</label>
                    <textarea class="form-control" id="keterangan" name="keterangan"></textarea>
                </div>

                <div class="form-group">
                    <label for="image">Pilih File Gambar</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="image" id="image" onchange="updateLabel()">
                        <label class="custom-file-label" for="image">Pilih file...</label>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
</div>
</div>

</div>
<script>
    function updateLabel() {
        var input = document.getElementById('image');
        var label = input.nextElementSibling;
        label.innerText = input.files[0] ? input.files[0].name : 'Pilih file...';
    }
</script>
<?php include('layouts/footer.php'); ?>
