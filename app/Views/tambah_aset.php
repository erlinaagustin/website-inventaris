 
<?php include('layouts/header.php'); ?>
<?php include('layouts/sidebar.php'); ?>
<?php include('layouts/topbar.php'); ?>
 
 <!-- Begin Page Content -->
                <div class="container-fluid">

                    <?= form_open('kebutuhan_aset/simpan', ['method' => 'post']); ?>
                        <!-- <div class="form-group">
                            <label for="kode_aset">Kode Aset</label>
                            <input type="text" class="form-control" name="kode_aset" id="kode_aset" required>
                        </div> -->

                        <div class="form-group">
                            <label for="nama_aset">Nama Aset</label>
                            <input type="text" class="form-control" name="nama_aset" id="nama_aset" required>
                        </div>

                        <div class="form-group">
                            <label for="jumlah">Jumlah</label>
                            <input type="number" class="form-control" name="jumlah" id="jumlah">
                        </div>

                        <div class="form-group">
                            <label for="perkiraan_harga">Perkiraan Harga</label>
                            <input type="text" class="form-control" name="perkiraan_harga" id="perkiraan_harga">
                        </div>

                        <div class="form-group">
                            <label for="tanggal">Tanggal</label>
                            <input type="date" class="form-control" name="tanggal" id="tanggal">
                        </div>

                        <!-- Field status diset secara otomatis menjadi NULL dan tidak ditampilkan di form -->
                        <input type="hidden" name="status" value="">

                        <div class="form-group">
                            <label for="keterangan">Keterangan</label>
                            <textarea class="form-control" name="keterangan" id="keterangan"></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Tambah Aset</button>
                    <?= form_close(); ?>


                    
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

 <?php include('layouts/footer.php'); ?>