<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

     <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url(); ?>pegawai">
        <div class="sidebar-brand-icon ">
          <i class="fas fa-school"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SISFO BKK</div>
      </a>


      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url(); ?>pegawai">
          <i class="fas fa-fw fa-home"></i>
          <span>Dashboard</span></a>
      </li>
                  <!-- Nav Item - Charts -->

       
                  <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-list"></i>
          <span>Data Master</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Sub Menu</h6>
            <a class="collapse-item" href="<?php echo base_url(); ?>pegawai/siswa">
            <i class="fas fa-fw fa-users"></i>
            <span>Data Siswa</span></a></a>
            <a class="collapse-item" href="<?php echo base_url(); ?>pegawai/jurusan">
            <i class="fas fa-fw fa-file"></i>
            <span>Data Jurusan</span></a>
            <a class="collapse-item" href="<?php echo base_url(); ?>pegawai/tahun">
            <i class="fas fa-fw fa-file"></i>
            <span>Data Tahun</span></a>
            <a class="collapse-item" href="<?php echo base_url(); ?>pegawai/perusahaan">
              <i class="fas fa-fw fa-building"></i>
            <span>Data Perusahaan</span></a>
            <a class="collapse-item" href="<?php echo base_url(); ?>pegawai/loker">
              <i class="fas fa-fw fa-table"></i>
            <span>Data Loker</span></a>
            <a class="collapse-item" href="<?php echo base_url(); ?>pegawai/pendaftaran">
              <i class="fas fa-fw fa-file"></i>
            <span>Data Pendaftaran</span></a>
            <a class="collapse-item" href="<?php echo base_url(); ?>pegawai/pengumuman">
              <i class="fas fa-fw fa-file"></i>
            <span>Data Pengumuman</span></a>
            <a class="collapse-item" href="<?php echo base_url(); ?>pegawai/tentang_bkk">
              <i class="fas fa-fw fa-file"></i>
            <span>Tentang BKK</span></a>
            <a class="collapse-item" href="<?php echo base_url(); ?>pegawai/identitas">
              <i class="fas fa-fw fa-school"></i>
            <span>Identitas BKK</span></a>
          </div>
        </div>
      </li>
      <li class="nav-item">
                <a class="nav-link collapsed " href="#" data-toggle="collapse" data-target="#collapseMaster" aria-expanded="true" aria-controls="collapseMaster">
                    <i class="fas fa-fw fa-file"></i>
                    <span>Report</span>
                </a>
                <div id="collapseMaster" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-light py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Master Report</h6>
                        <a class="collapse-item" href="<?php echo base_url(); ?>pegawai/laporan_siswa_persentase"><i class="fas fa-fw fa-file"></i> Siswa</a>
                        <a class="collapse-item" href="<?php echo base_url(); ?>pegawai/laporan_perusahaan"><i class="fas fa-fw fa-file"></i> Perusahaan</a>
                        <a class="collapse-item" href="<?php echo base_url(); ?>pegawai/laporan_pendaftaran"><i class="fas fa-fw fa-file"></i> Pendaftaran</a>
                    </div>
                </div>
            </li>

      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url(); ?>pegawai/edit">
          <i class="fas fa-fw fa-cog"></i>
          <span>Setting</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url(); ?>pegawai/changepassword">
          <i class="fas fa-fw fa-cog"></i>
          <span>Change Password</span></a>
      </li>

      <!-- Nav Item - Charts -->
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url(); ?>auth/logout">
          <i class="fas fa-fw fa-sign-out-alt"></i>
          <span>Logout</span></a>
      </li>
      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->
          <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

           

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $user['nama'];  ?></span>
                <img class="img-profile rounded-circle" src="<?php echo base_url('assets/img/profile/'). $user['image']; ?>">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="<?php echo base_url(); ?>pegawai/edit">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                  Activity Log
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->