<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url() ?>">
<div class="sidebar-brand-text mx-3">Warung-CI</div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item">
    <a class="nav-link" href="<?php echo base_url() ?>">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
</li>


<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
    aria-expanded="true" aria-controls="collapseTwo">
    <i class="fas fa-fw fa-database"></i>
    <span>Master Data</span>
</a>
<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item" href="<?php echo base_url('barang') ?>">Barang</a>
        <a class="collapse-item" href="<?php echo base_url('user') ?>">User</a>
        <a class="collapse-item" href="<?php echo base_url('pelanggan') ?>">Pelanggan</a>
    </div>
</div>
</li>

<!-- Nav Item - Utilities Collapse Menu -->
<li class="nav-item">
<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
    aria-expanded="true" aria-controls="collapseUtilities">
    <i class="fas fa-fw fa-wrench"></i>
    <span>Pengaturan</span>
</a>
<div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
    data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item" href="">Pengaturan 1</a>
        <a class="collapse-item" href="">Pengaturan 2</a>
    </div>
</div>
</li>

<!-- Nav Item - Dashboard -->
<li class="nav-item">
    <a class="nav-link" href="<?php echo base_url('transaksi/baru') ?>">
        <i class="fas fa-fw fa-money"></i>
        <span>Transaksi Baru</span></a>
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

    <h3><?php echo ucwords($title); ?></h3>
   <!--  <form
        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
        <div class="input-group">
            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                aria-label="Search" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                    <i class="fas fa-search fa-sm"></i>
                </button>
            </div>
        </div>
    </form> -->

    <!-- Topbar Navbar -->
    <a href="<?php echo base_url('transaksi/baru') ?>" class="nav-item btn btn-primary ml-auto ">
        <strong>&plus;Transaksi baru</strong>
    </a>
    
    <!-- profil button -->
    <ul class="navbar-nav">

       
        <!-- Nav Item - Alerts -->
      
        

        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo ucwords($this->session->userdata('nama')) ?></span>
                <img class="img-profile rounded-circle"
                    src="<?php echo base_url('assets/'); ?>img/undraw_profile.svg">
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="userDropdown">
                <a class="dropdown-item" href="<?php echo base_url('profil') ?>">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    Profil
                </a>

                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout
                </a>
            </div>
        </li>

    </ul>

</nav>
<!-- End of Topbar -->

<!-- CONTAINER -->
    <div class="container my-4">
        <!-- Content here -->
