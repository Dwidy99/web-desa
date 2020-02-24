<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->

    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

    <div class="row">
        <div class="col-lg-6">
            <form action="" method="post">

                <input type="hidden" name="id" value="<?= $kepegawaian['id']; ?>">

                <div class="form-group">
                    <label for="nama">Nama Pegawai</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="<?= $kepegawaian['nama'];; ?>">
                    <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="jabatan">Jabatan</label>
                    <input type="text" class="form-control" id="jabatan" name="jabatan"
                        value="<?= $kepegawaian['jabatan']; ?>">
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" class="form-control" id="alamat" name="alamat"
                        value="<?= $kepegawaian['alamat'];; ?>">
                </div>
                <div class="form-group">
                    <label for="telepon">No. Telepon</label>
                    <input type="text" class="form-control" id="telepon" name="telepon"
                        value="<?= $kepegawaian['telepon'];; ?>">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <a href="<?= base_url('laporan/pegawai'); ?>" class="badge badge-success float-lg-left"><i
            class="fas fa-arrow-circle-left"></i>
        Kembali</a>

</div>
<!-- /.container-fluid -->

</div>









<!-- End of Main Content -->