<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="card">
        <div class="card-header">
            Form Tambah Data Berita
        </div>
        <div class="card-body">
            <?= form_open_multipart('berita/tambah'); ?>

            <div class="form-group">
                <label for="judul">Judul Berita</label>
                <input type="text" class="form-control" id="judul" name="judul">
                <?= form_error('judul', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi" class="form-control" rows="5"></textarea>
                <?= form_error('deskripsi', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="alert alert-danger" role="alert">
                ekstensi file gambar yang bisa diupload adalah <span class="alert-link">.jpg .png .JPG .PNG
                    .JPEG</span>!
            </div>
            <div class="form-group">
                <label for="gambar">Gambar
                    <input type="file" class="form-controlfile" id="gambar" name="gambar" required>
                </label>
            </div>
            <div class="form-group">
                <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
            </div>

            <?= form_close() ?>
        </div>
    </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
