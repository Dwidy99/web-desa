<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

    <div class="fluid-jumbotron text-center">
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-info" role="alert">
                    <h4 class="alert-heading">MISI <?= $misi['no']; ?></h4>
                    <p><?= $misi['misi']; ?></p>
                    <hr>
                </div>
            </div>
        </div>
    </div>

    <a href="<?= base_url('admin/misi') ?>" class="badge badge-info"><i class="fas fa-arrow-circle-left"></i>
        Kembali</a>
    <a href="<?= base_url(); ?>admin/ubahMisi/<?= $misi['id']; ?>" class="badge badge-warning"><i class="fas fa-edit">
            Ubah Data Berita
        </i></a>

</div>
<!-- /.container-fluid -->

</div>









































<!-- End of Main Content -->