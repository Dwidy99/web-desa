<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->

    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

    <div class="row">
        <div class="col-lg-6">
            <?= form_open_multipart('laporan/tambahPegawai'); ?>

            <div class="form-group">
                <label for="nama">Nama Pegawai</label>
                <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama pegawai..">
                <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
                <label for="jabatan">Jabatan</label>
                <input type="text" class="form-control" id="jabatan" name="jabatan" placeholder="Jabatan..">
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <textarea class="form-control" id="alamat" name="alamat" rows="3"></textarea>
            </div>
            <div class="form-group">
                <label for="telepon">No. Telepon</label>
                <input type="text" class="form-control" id="telepon" name="telepon" placeholder="Nomor Telepon..">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
            </div>

            <?= form_close(); ?>
        </div>
    </div>

    <a href="<?= base_url('laporan/pegawai'); ?>" class="badge badge-success float-lg-left"><i
            class="fas fa-arrow-circle-left"></i>
        Kembali</a>

</div>
<!-- /.container-fluid -->

</div>









<!-- End of Main Content -->