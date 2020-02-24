<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-user-cog"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Cilangkap Admin <sup>2</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Admin
    </div>

    <li class="nav-item active">
    <li class="nav-item">

        <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('admin'); ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Beranda</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        User
    </div>

    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('user/index'); ?>">
            <i class="far fa-file-image"></i>
            <span>Profil Saya</span></a>

        <a class="nav-link" href="<?= base_url('user/edit'); ?>">
            <i class="far fa-file-image"></i>
            <span>Ubah Profil</span></a>

        <a class="nav-link" href="<?= base_url('user/changePassword'); ?>">
            <i class="far fa-file-image"></i>
            <span>Ganti Kata Sandi</span></a>
    </li>

    <!-- Heading -->
    <div class="sidebar-heading">
        Banner
    </div>

    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('profile/index'); ?>">
            <i class="far fa-file-image"></i>
            <span>Banner Profil</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Program
    </div>

    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('admin/visi'); ?>">
            <i class="fas fa-book"></i>
            <span>Visi</span></a>

        <a class="nav-link" href="<?= base_url('admin/misi'); ?>">
            <i class="fas fa-book-open"></i>
            <span>Misi</span></a>

        <a class="nav-link" href="<?= base_url('admin/program'); ?>">
            <i class="fas fa-book-open"></i>
            <span>Program Unggulan</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Kegiatan
    </div>

    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('berita/index'); ?>">
            <i class="far fa-newspaper"></i>
            <span>Berita & Kegiatan</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Laporan
    </div>

    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('laporan'); ?>">
            <i class="fas fa-wallet"></i>
            <span>Anggaran</span></a>

        <a class="nav-link" href="<?= base_url('laporan/pegawai'); ?>">
            <i class="fas fa-user-plus"></i>
            <span>Kepegawaian</span></a>

        <a class="nav-link" href="<?= base_url('laporan/laporanLain'); ?>">
            <i class="fas fa-book"></i>
            <span>Laporan lain-lain</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('auth/logout'); ?>">
            <i class="fas fa-fw fa-sign-out-alt"></i>
            <span>Keluar</span>
        </a>

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

</ul>
<!-- End of Sidebar -->
