<!-- Card News Detail -->
<section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8 col-md-8 mx-auto">
                <h2 class="display-5">
                    Berita & Kegiatan
                </h2>
                <hr>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8 col-md-8 mx-auto">
                <div class="jumbotron">

                    <?php foreach ($berita as $news) : ?>
                    <div class="card my-3">
                        <div class="row no-gutters">
                            <div class="image col-md-5">
                                <a href="<?= base_url(); ?>web/detailBerita/<?= $news['id']; ?>" class="alert-link">
                                    <img src="<?= base_url('assets/img/berita/') . $news['gambar']; ?>" class="card-img"
                                        style="max-width: 500px; max-height: 190px;">
                                </a>
                            </div>
                            <div class="col-md-7">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $news['judul'] ?></h5>
                                    <a href="<?= base_url(); ?>web/detailBerita/<?= $news['id']; ?>" class="alert-link">
                                        <p class="card-text">
                                            <?= substr($news['deskripsi'], 0, 100); ?>
                                        </p>
                                    </a>
                                    <p class="card-text"><small
                                            class="text-muted"><?= date('d F Y', $news['date_created']); ?></small>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>

                    <div class="row">
                        <div class="col">
                            <?= $this->pagination->create_links(); ?>
                        </div>
                    </div>

                </div>
            </div>
        </div>


    </div>
</section>
























<!-- End Card News Detail -->