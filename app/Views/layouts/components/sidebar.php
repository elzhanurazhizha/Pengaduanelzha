<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Pengaduan Masyarakat Elzha<sup>2</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="index.html">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Menu
    </div>
    <!-- Diveder -->
    <hr class="sidebar-diveder">

    <!-- ADMIN-->
    <?php
    if (session('level') == "admin") {
    ?>
        <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse2" aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-cog"></i>
                <span>PETUGAS</span>
            </a>
            <div id="collapse2" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Registrasi</h6>
                    <a class="collapse-item" href="/petugas">Tambah Data</a>
                    <a class="collapse-item" href="/masyarakat">Data Masyarakat</a>

                    <h6 class="collapse-header">Laporan</h6>
                    <a class="collapse-item" href="/laporandata">Laporan</a>


                </div>
            </div>

        </li>
    <?php
    }
    ?>

    <!--PETUGAS-->
    <?php
    if (session('level') == "petugas") {
    ?>
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse2" aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-cog"></i>
                <span>PETUGAS</span>
            </a>
            <div id="collapse2" class="collapse" aria-labelledby="headingUtiliyies" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Custom Component</h6>
                    <a class="collapse-item" href="/pengaduan">Pengaduan</a>

                </div>
            </div>
        </li>
    <?php
    }
    ?>

    <!-- Nav Item - Utilities Collapse Menu -->

    <!-- MASYARAKAT-->
    <?php

    if (session('level') == "masyarakat") {
    ?>
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse2" aria-expanded="true" aria-controls="collapseUtilities">
                <i class="fas fa-floopy-disk"></i>
                <span>Tulis Pengaduanmu</span>
            </a>
            <div id="collapse2" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Menu</h6>
                    <!--<a class="collapse-item"> href="/tulis">From Pengaduan</a>-->
                    <a class="collapse-item" href="/pengaduan">Pengaduan</a>


                </div>
            </div>
        </li>

    <?php
    }

    ?>
    <?php if (!empty(session()->get('log_in'))) : ?>
        <li class="nav-item">
            <a href="/login" class="nav-link">
                <i class="fas fa-sign-out-alt"></i>
                <span>Log Out</span>
            </a>
        </li>
    <?php endif ?>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->



    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

    <!-- Sidebar Message -->


</ul>