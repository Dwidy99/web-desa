<style>
pre {
    display: block;
    white-space: pre-wrap;
    font-family: Verdana, Geneva, Tahoma, sans-serif;
}
</style>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

    <div class="fluid-jumbotron">
        <div class="row">
            <div class="col-md-12">
                <figure class="figure text-center">
                    <img src="<?= base_url('assets/img/berita/') . $berita->gambar; ?>"
                        class="img-fluid img-thumbnail rounded">
                    <p><?= date('d F Y', $berita->date_created); ?></p>
                    <hr>
                </figure>
                <figcaption class="figure-caption text-center">
                    <strong>
                        <h3><?= $berita->judul; ?>
                    </strong></h3>
                </figcaption>
                <div class="row">
                    <div class="container float-left">
                        <div class="col-md-12">
                            <br>
                            <pre class="figure-caption float-left"><?= $berita->deskripsi; ?></pre>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <a href="<?= base_url('berita/index') ?>" class="badge badge-info"><i
            class="fas fa-arrow-circle-left"></i>Kembali</a>
    <a href="<?= base_url(); ?>berita/ubah/<?= $berita->id; ?>" class="badge badge-warning"><i class="fas fa-edit">
            Ubah Data Berita
        </i></a>

</div>
<!-- /.container-fluid -->

</div>









































<!-- End of Main Content -->