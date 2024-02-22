 
<?php include('layouts/header.php'); ?>
<?php include('layouts/sidebar.php'); ?>
<?php include('layouts/topbar.php'); ?>
 
 <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Aset Nonaktif</h1>
                    
                    <!-- Tombol Tambah Data -->
                    <!-- <a href="/kelola-aset/tambah" class="btn btn-primary mb-2">+ Tambah</a> -->
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Tabel Aset Nonaktif</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                        <th>No</th>
                                        <th>Kode Aset</th>
                                        <th>Nama Aset</th>
                                        <th>Action</th>
                                        </tr>
                                    </thead>
                                    <!-- <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Merek</th>
                                            <th>Keterangan</th>
                                        </tr>
                                    </tfoot> -->
                                    <tbody>
                                        <?php if (!empty($aset_nonaktif) && is_array($aset_nonaktif)) : ?>
                                            <?php $no = 1; ?>
                                            <?php foreach ($aset_nonaktif as $item) : ?>
                                                <tr>
                                                    <td><?php echo $no++; ?></td>
                                                    <td><?php echo esc($item['kode_aset']); ?></td>
                                                    <td><?php echo esc($item['nama_aset']); ?></td>
                                                    <td>
                                                        <a href="aset_nonaktif/detail/<?= $item['kode_aset_nonaktif']; ?>"><i class="fas fa-eye"></i></a>
                                                        <a href="aset_nonaktif/delete/<?= $item['kode_aset_nonaktif']; ?>"><i class="fas fa-trash-alt"></i></a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php else : ?>
                                            <tr>
                                                <td colspan="4">Tidak ada data aset nonaktif.</td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

 <?php include('layouts/footer.php'); ?>