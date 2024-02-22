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
                            <label for="perkiraan_harga">Harga</label>
                            <input type="text" class="form-control" id="perkiraan_harga" name="perkiraan_harga" value="<?= esc($aset['perkiraan_harga']); ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="jumlah">Jumlah</label>
                            <input type="text" class="form-control" id="jumlah" name="jumlah" value="<?= esc($aset['jumlah']); ?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="container">
                            <div class="row">
                            <div class="col-md-6">
                                <img src="<?= base_url('uploads/' . $aset['foto']); ?>" alt="<?= esc($aset['nama_aset']); ?>" width="100px">          
                            </div>
                            <div class="col-md-6">
                                <img src="<?= base_url('uploads/' . $aset['foto']); ?>" alt="<?= esc($aset['nama_aset']); ?>" width="100px">          
                            </div>
                            </div>
                        </div>
                        
                            
                    </div>
                </div>
            </div>
          
            
        
        </div>
    </div>
    
</div>