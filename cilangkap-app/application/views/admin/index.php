<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->

    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

    <?php if ($this->session->flashdata('logout')) : ?>
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?= $this->session->flashdata('logout'); ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <div class="jumbotron">
        <h1 class="display-4">Selamat Datang!</h1>
        <div class="alert alert-success" role="alert">
            <p class="lead">konten Manajemen Sistem Website Desa Cilangkap</p>
        </div>
        <hr class="my-4">
    </div>

</div>
<!-- /.container-fluid -->

</div>

<!-- End of Main Content 
-->
