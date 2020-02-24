<style>
pre {
    display: block;
    white-space: pre-wrap;
    font-family: Verdana, Geneva, Tahoma, sans-serif;
}
</style>
<!-- Begin Page Content -->

<div class="container-fluid col-md-10 offset-md-1 justify-content-center">

    <!-- Page Heading -->

    <div class="jumbotron">
        <div class="row text-center">
            <div class="col-md-12">
                <figure class="figure">
                    <img src="<?= base_url('assets/img/berita/') . $berita['gambar']; ?>"
                        class="img-thumbnail rounded text-center" style="width: 600px; max-height: 450px;">
                </figure>
            </div>
        </div>
        <hr>
        <div class="row text-center">
            <div class="col-md-12">
                <strong>
                    <h3><?= $berita['judul']; ?></h3>
                    <small><?= date('d F Y', $berita['date_created']); ?></small>
                </strong>
            </div>
        </div>
        <div class="row">
            <div class="container float-left">
                <div class="col-md-12">
                    <br>
                    <pre class="figure-caption"><?= $berita['deskripsi']; ?></pre>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->



























































<!-- End of Main Content -->