<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->

    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

    <div class="card">
        <div class="card-header">
            Form Ubah Data Berita
        </div>
        <div class="card-body">
            <form action="" method="post" enctype="multipart/form-data">

                <input type="hidden" name="id" value="<?= $berita->id; ?>">

                <div class="form-group">
                    <label for="judul">Judul Berita</label>
                    <input type="text" class="form-control" id="judul" name="judul" value="<?= $berita->judul; ?>">
                </div>
                <div class="form-group">
                    <label for="deskripsi">Deskripsi</label>
                    <textarea name="deskripsi" id="deskripsi" class="form-control"
                        rows="5"><?= $berita->deskripsi; ?></textarea>
                </div>

                <div class="card" style="width: 18rem;">
                    <img src="<?= base_url('assets/img/berita/') . $berita->gambar; ?>" class="card-img-top">
                </div>

                <div class="alert alert-danger" role="alert">
                    ekstensi file gambar yang bisa diupload adalah <span class="alert-link">.jpg .png .JPG .PNG
                        .JPEG</span>!
                </div>
                <div class="form-group">
                    <label for="gambar">Gambar</label>
                    <input type="file" class="form-controlfile" id="gambar" name="gambar">
                    <input type="hidden" name="old_image" value="<?= $berita->gambar; ?>">
                </div>

                <div class="form-group">
                    <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                </div>

            </form>
        </div>
    </div>
    <a href="<?= base_url('berita/index') ?>" class="badge badge-success"><i
            class="fas fa-arrow-circle-left"></i>Kembali</a>

</div>
<!-- /.container-fluid -->

</div>





































<!-- End of Main Content -->