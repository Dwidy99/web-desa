<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

    <?php if ($this->session->flashdata('slider')) : ?>
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?= $this->session->flashdata('slider'); ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <?= form_open_multipart('profile/ubahSlider'); ?>

    <input type="hidden" name="id" value="<?= $slider['id']; ?>">

    <div class="card">
        <div class="card-header">
            Form Ubah Gambar
        </div>
        <div class="card-body mx-auto">
            <img src="<?= base_url('assets/img/slider/') . $slider['gambar']; ?>" class="img-thumbnail">
        </div>
    </div>
    <div class="form-group">
        <label for="image">Input Gambar Banner</label>
        <div class="alert alert-danger" role="alert">
            *ekstensi file gambar yang bisa diupload adalah <span class="alert-link">.jpg .png .JPG .PNG
                .JPEG</span>!
        </div>
        <input type="file" class="form-control-file" name="gambar" required>
        <input type="hidden" name="old_gambar" value="<?= $slider['gambar']; ?>">
        <?= form_error('gambar', '<small class="text-danger pl-3">', '</small>'); ?>
    </div>

    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="ubah" value="simpan">
    </div>

    <!-- <?= form_close() ?> -->

    <!-- <a href="<?= base_url(); ?>profile/ubahSlider/<?= $slider['id']; ?>" class="btn btn-warning">Ubah Gambar</a> -->

</div>
<!-- /.container-fluid -->

</div>


<!-- End of Main Content -->
