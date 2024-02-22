<!-- views/detail_aset.php -->
<?= $this->include('layouts/header') ?>
<?= $this->include('layouts/sidebar') ?>
<?= $this->include('layouts/topbar') ?>

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Detail Aset</h6>
        </div>
        <div class="card-body">
        <form action="<?= base_url('kelola-aset/update') ?>" method="POST" enctype="multipart/form-data">

                <?= csrf_field() ?>
                <input type="hidden" name="id_kelola" value="<?= esc($kelola_aset['id_kelola']); ?>">

                <div class="row">
                    <div class="col-md-4">
                        <!-- Kode Aset -->
                        <div class="form-group">
                            <label for="kode_aset">Kode Aset</label>
                            <input type="text" class="form-control" id="kode_aset" name="kode_aset" value="<?= esc($kelola_aset['kode_aset']); ?>">
                        </div>

                        <!-- Nama Aset -->
                        <div class="form-group">
                            <label for="nama_aset">Nama Aset</label>
                            <input type="text" class="form-control" id="nama_aset" name="nama_aset" value="<?= esc($kelola_aset['nama_aset']); ?>" >
                        </div>

                        <!-- Harga Aset -->
                        <div class="form-group">
                            <label for="harga">Harga Aset</label>
                            <input type="text" class="form-control" id="harga" name="harga" value="<?= esc($kelola_aset['harga']); ?>">
                        </div>

                        <!-- Jumlah Aset -->
                        <div class="form-group">
                            <label for="jumlah">Jumlah Aset</label>
                            <input type="text" class="form-control" id="jumlah" name="jumlah" value="<?= esc($kelola_aset['jumlah']); ?>">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <!-- Kategori -->
                        <div class="form-group">
                            <label for="id_kategori">Kategori</label>
                            <select class="form-control" id="id_kategori" name="id_kategori">
                                <?php foreach ($kategori as $item) : ?>
                                    <option value="<?= $item['id_kategori']; ?>" <?= ($kelola_aset['id_kategori'] == $item['id_kategori']) ? 'selected' : ''; ?>>
                                        <?= $item['nama_kategori']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <!-- Ruangan -->
                        <div class="form-group">
                            <label for="id_ruangan">Ruangan</label>
                            <select class="form-control" id="id_ruangan" name="id_ruangan">
                                <?php foreach ($ruangan as $item) : ?>
                                    <option value="<?= $item['id_ruangan']; ?>" <?= ($kelola_aset['id_ruangan'] == $item['id_ruangan']) ? 'selected' : ''; ?>>
                                        <?= $item['nama_ruangan']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <!-- Merek -->
                        <div class="form-group">
                            <label for="id_merek">Merek</label>
                            <select class="form-control" id="id_merek" name="id_merek">
                                <?php foreach ($merek as $item) : ?>
                                    <option value="<?= $item['id_merek']; ?>" <?= ($kelola_aset['id_merek'] == $item['id_merek']) ? 'selected' : ''; ?>>
                                        <?= $item['nama_merek']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <!-- Kondisi -->
                        <div class="form-group">
                            <label for="id_kondisi">Kondisi</label>
                            <select class="form-control" id="id_kondisi" name="id_kondisi">
                                <?php foreach ($kondisi as $item) : ?>
                                    <option value="<?= $item['id_kondisi']; ?>" <?= ($kelola_aset['id_kondisi'] == $item['id_kondisi']) ? 'selected' : ''; ?>>
                                        <?= $item['nama_kondisi']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <!-- Pilih File Gambar -->
                        <div class="form-group">
                            <label for="image">Pilih File Gambar</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="image" id="image" onchange="updateLabel()">
                                <label class="custom-file-label" for="image">Pilih file...</label>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tanggal -->
                <div class="form-group">
                    <label for="tanggal">Tanggal</label>
                    <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?= $kelola_aset['tanggal']; ?>">
                </div>

                <!-- Keterangan -->
                <div class="form-group">
                    <label for="keterangan">Keterangan</label>
                    <textarea class="form-control" id="keterangan" name="keterangan"><?= $kelola_aset['keterangan']; ?></textarea>
                </div>

                <!-- Tombol Submit -->
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
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

<?= $this->include('layouts/footer') ?>
