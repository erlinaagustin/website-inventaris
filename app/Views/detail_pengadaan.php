<?php include('layouts/header.php'); ?>
<?php include('layouts/sidebar.php'); ?>
<?php include('layouts/topbar.php'); ?>

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Detail Pengadaan</h6>
        </div>
        <div class="card-body">
        <div class="form-group">
                <label for="id_pengadaan">ID Pengadaan</label>
                <input type="text" class="form-control" id="id_pengadaan" name="id_pengadaan" value="<?= $pengadaan['id_pengadaan']; ?>" readonly>
            </div>

            <div class="form-group">
                <label for="tanggal">Tanggal</label>
                <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?= $pengadaan['tanggal']; ?>" readonly>
            </div>

            <div class="form-group">
                <label for="nomor_pengadaan">Nomor Pengadaan</label>
                <input type="text" class="form-control" id="nomor_pengadaan" name="nomor_pengadaan" value="<?= $pengadaan['nomor_pengadaan']; ?>" readonly>
            </div>

            <div class="form-group">
                <label for="perihal">Perihal</label>
                <input type="text" class="form-control" id="perihal" name="perihal" value="<?= $pengadaan['perihal']; ?>" readonly>
            </div>

            <div class="form-group">
                <label for="latar_belakang">Latar Belakang</label>
                <textarea class="form-control" id="latar_belakang" name="latar_belakang" readonly><?= $pengadaan['latar_belakang']; ?></textarea>
            </div>

            <div class="form-group">
                <label for="permasalahan">Permasalahan</label>
                <textarea class="form-control" id="permasalahan" name="permasalahan" readonly><?= $pengadaan['permasalahan']; ?></textarea>
            </div>

            <div class="form-group">
                <label for="usulan">Usulan</label>
                <textarea class="form-control" id="usulan" name="usulan" readonly><?= $pengadaan['usulan']; ?></textarea>
            </div>

            <div class="form-group">
                <label for="pertimbangan">Pertimbangan</label>
                <textarea class="form-control" id="pertimbangan" name="pertimbangan" readonly><?= $pengadaan['pertimbangan']; ?></textarea>
            </div>

            <div class="form-group">
                <label for="kode_aset">Kode Aset</label>
                <input type="text" class="form-control" id="kode_aset" name="kode_aset" value="<?= $pengadaan['kode_aset']; ?>" readonly>
            </div>
        </div>                      
        </div>
    </div>
        
            
    </div>


<?php include('layouts/footer.php'); ?>