<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <div class="container">
        <a class="navbar-brand" href="<?= base_url('home'); ?>">
            <img src="<?= base_url('assets/'); ?>assets-web/img/icon/logo-1.png" width="60" height="30"> Desa
            Cilangkap
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>

    <div class=" collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="<?= base_url('home'); ?>">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown-1" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    Profile
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown-1">
                    <a class="dropdown-item" href="<?= base_url('web') ?>">Visi Misi</a>
                    <a class="dropdown-item" href="<?= base_url('web/program') ?>">Program Unggulan</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('web/berita'); ?>">Berita</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown-3" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    Laporan
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown-3">
                    <a class="dropdown-item" href="<?= base_url('web/anggaran'); ?>">Anggaran</a>
                    <a class="dropdown-item" href="<?= base_url('web/kepegawaian'); ?>">Kepegawaian</a>
                    <a class="dropdown-item" href="<?= base_url('web/laporanLain'); ?>">Laporan Lain</a>
                </div>
            </li>
        </ul>


    </div>




























    </div>
</nav>
<!-- End Navbar -->