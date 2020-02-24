<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

    <div class="row justify-content-center">
        <div class="col-md-10">

            <div class="card">
                <div class="card-header">
                    Form Ubah Data Misi
                </div>
                <div class="card-body">
                    <?php if (validation_errors()) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?= validation_errors(); ?>
                    </div>
                    <?php endif; ?>
                    <form action="" method="post">
                        <input type="hidden" name="id" value="<?= $misi['id']; ?>">
                        <div class="form-group">
                            <label for="no">Misi Ke</label>
                            <input type="text" class="form-control" id="no" name="no" value="<?= $misi['no']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="misi">Deskripsi Misi</label>
                            <textarea class="form-control" id="misi" name="misi"
                                rows="3"><?= $misi['misi']; ?></textarea>
                        </div>
                        <button type="submit" name="tambah" class="btn btn-primary">Ubah Data</button>
                    </form>
                    <a href="<?= base_url(); ?>admin/detail/<?= $misi['id']; ?>" class="badge badge-info"><i
                            class="fas fa-info-circle">Kembali</i></a>
                </div>
            </div>

        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>











<!-- End of Main Content -->