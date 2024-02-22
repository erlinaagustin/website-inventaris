<?php include('layouts/header.php'); ?>
<?php include('layouts/sidebar.php'); ?>
<?php include('layouts/topbar.php'); ?>

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Detail Aset</h6>
        </div>
        <div class="card-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="nama_aset">Nama Aset</label>
                            <input type="text" class="form-control" id="nama_aset" name="nama_aset" value="<?= esc($aset['nama_aset']); ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="kode_aset">Kode Aset</label>
                            <input type="text" class="form-control" id="kode_aset" name="kode_aset" value="<?= esc($aset['kode_aset']); ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="nama_kategori">Kategori</label>
                            <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" value="<?= esc($aset['nama_kategori']); ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="nama_merek">Merek</label>
                            <input type="text" class="form-control" id="nama_merek" name="nama_merek" value="<?= esc($aset['nama_merek']); ?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="nama_ruangan">Ruangan</label>
                            <input type="text" class="form-control" id="nama_ruangan" name="nama_ruangan" value="<?= esc($aset['nama_ruangan']); ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="nama_kondisi">Kondisi</label>
                            <input type="text" class="form-control" id="nama_kondisi" name="nama_kondisi" value="<?= esc($aset['nama_kondisi']); ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="harga">Harga</label>
                            <input type="text" class="form-control" id="harga" name="harga" value="<?= esc($aset['harga']); ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="jumlah">Jumlah</label>
                            <input type="text" class="form-control" id="jumlah" name="jumlah" value="<?= esc($aset['jumlah']); ?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <img src="<?= base_url('uploads/' . $aset['foto']); ?>" alt="<?= esc($aset['nama_aset']); ?>" width="100%">
                                </div>
                                <div class="col-md-12">
                                    <?php if($aset['qr_code']): ?>
                                        <img src="<?= base_url($aset['qr_code']); ?>" alt="<?= esc($aset['nama_aset']); ?>" width="100%">
                                    <?php endif;?>
                                </div>
                            </div>
                        </div>

                        <!-- Tanggal Nonaktif -->
                        <div class="mt-2">
                            <label for="tanggal_nonaktif">Tanggal Nonaktif</label>
                            <input type="text" class="form-control" id="tanggal_nonaktif" name="tanggal_nonaktif" value="<?= esc($aset['tanggal_nonaktif']); ?>" readonly>
                        </div>

                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('layouts/footer.php'); ?>
