<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
                <div class="sidebar-brand-icon rotate-n-15">
                <i class="fa-solid fa-building-columns"></i>
                </div>
                <div class="sidebar-brand-text mx-3">BPR Central KEPRI</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="/">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>
          
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <span>Data Master</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="merek">Merek</a>
                        <a class="collapse-item" href="kategori">Kategori</a>
                        <a class="collapse-item" href="ruangan">Ruangan</a>
                        <a class="collapse-item" href="kondisi">Kondisi</a>
                    </div>
                </div>
            </li>
          

            <?php if (in_groups('admin')): ?>
            <li class="nav-item">
                <a class="nav-link" href="kebutuhan_aset">
                    <span>Data Kebutuhan Aset</span></a>
            </li>
            <?php endif; ?>

            <?php if (in_groups('atasan')): ?>
            <li class="nav-item">
                <a class="nav-link" href="kebutuhan_aset_atasan">
                    <span>Pengajuan Aset</span></a>
            </li>
            <?php endif; ?>
            

          
            <li class="nav-item">
                <a class="nav-link" href="pengadaan">
                    <span>Data Pengadaan</span></a>
            </li>
           

          
            <li class="nav-item">
                <a class="nav-link" href="kelola-aset">
                    <span>Pengolahan Aset</span></a>
            </li>
          

           
            <li class="nav-item">
                <a class="nav-link" href="aset_nonaktif">
                    <span>Aset Non Aktif</span></a>
            </li>
           

            
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Data Laporan</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        
                        <a class="collapse-item" href="laporan_aset">Laporan Data Aset</a>
                        <a class="collapse-item" href="laporan_aset_nonaktif">Laporan Aset Non Aktif</a>
                        <a class="collapse-item" href="laporan_pengadaan">Laporan Aset Pengadaan</a>
                        <a class="collapse-item" href="data_laporan_perbaikan">Laporan Aset Perbaikan</a>
                       
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="laporan_perbaikan">
                    <span>Perbaikan</span></a>
            </li>
          
            <?php if (in_groups('atasan')): ?>
            <li class="nav-item">
                <a class="nav-link" href="pengguna">
                    <span>Kelola User</span></a>
            </li>
            <?php endif; ?>

            <li class="nav-item">
                <a class="nav-link collapsed" href="profil">
                <i class='bx bx-user-pin'></i>
                    <span>Profile</span>
                </a>
            </li>
            
            
            <li class="nav-item">
                <a class="nav-link" href="logout">
                    <!-- <i class="fas fa-fw fa-chart-area"></i> -->
                    <span>Logout</span></a>
            </li>
            

            
              

        </ul>
        <!-- End of Sidebar -->