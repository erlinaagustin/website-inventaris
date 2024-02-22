 
<?php include('layouts/header.php'); ?>
<?php include('layouts/sidebar.php'); ?>
<?php include('layouts/topbar.php'); ?>
 
 <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Data Kondisi</h1>
                    <!-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
                        For more information about DataTables, please visit the <a target="_blank"
                            href="https://datatables.net">official DataTables documentation</a>.</p> -->

                    <!-- Tombol Tambah Data -->
                    <a href="kondisi/tambah" class="btn btn-primary mb-2">+ Tambah</a>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Tabel Data Kondisi</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                        <th>No</th>
                                        <th>Nama Kondisi</th>
                                        <th>Keterangan</th>
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
                                    <?php if(!empty($kondisi) && is_array($kondisi)): ?>
                                        <?php $no = 1; ?>
                                        <?php foreach($kondisi as $item): ?>
                                            <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td><?php echo esc($item['nama_kondisi']); ?></td>
                                                <td><?php echo esc($item['keterangan']); ?></td>
                                                <td>
                                                <a href="kondisi/edit/<?= $item['id_kondisi']; ?>"><i class="fas fa-edit"></i></a>
                                                    &nbsp;<!-- Menambahkan spasi -->
                                                    &nbsp;<!-- Menambahkan spasi -->
                                                    <a href="kondisi/delete/<?= $item['id_kondisi']; ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');"><i class="fas fa-trash-alt"></i></a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="3">Tidak ada data kondisi.</td>
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