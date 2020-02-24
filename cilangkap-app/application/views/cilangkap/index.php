<!-- Slider -->
<div class="container-fluid pb-4 p-md-2 carousel">
    <div id="my-carousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="<?= base_url('assets/img/slider/') . $slider['gambar']; ?>" style="">
                <div class="carousel-caption d-none d-md-block" style="color: #f1f3f4;">
                    <h1>Selamat Datang!</h1>
                    <h3>Website Desa Cilangkap Kabupaten Lebak Provinsi Banten</h3>
                </div>
                <div class=" container">
                    <div class="carousel-caption d-none d-md-block">
                        <div class="col-md-5 p-lg-5 mx-auto my-5">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- End Slider -->

<!-- Welcome -->



<!-- End welcome -->

<!-- Slider Card -->
<!-- <section class="slider-card" id="slider-card">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h4 class="text-center">Berita Terbaru</h4>
                <hr>
            </div>
        </div>
        <div class="owl-carousel owl-theme">
            <?php foreach ($berita as $news) : ?>
            <div class="item">
                <a href="<?= base_url(); ?>web/detailBerita/<?= $news['id']; ?>">
                    <img src="<?= base_url('assets/img/berita/') . $news['gambar']; ?>" class="card-img"
                        style="max-width: 500px; max-height: 190px;">
                </a>
                <a href="<?= base_url(); ?>web/detailBerita/<?= $news['id']; ?>">
                    <p><?= $news['judul'] ?></p>
                </a>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section> -->
<!-- End Slider Card -->

<!-- List Group -->

<section class="news-home text-center" id="news-home">
    <div class="container">
        <br>
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h4 class="text-center">Berita Terbaru</h4>
                <a href="<?= base_url('web/berita'); ?>" class="badge badge-info">Lihat semua berita >></a>
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card-deck mb-3">
                    <?php $n = 0;
					foreach ($berita as $news) {
						if ($n % 2 == 0) { ?>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <a href="<?= base_url(); ?>web/detailBerita/<?= $news['id']; ?>">
                                    <img src="<?= base_url('assets/img/berita/') . $news['gambar']; ?>"
                                        class="card-img-top">
                                </a>
                                <div class="card-body">
                                    <h5 class="card-title"><?= $news['judul']; ?></h5>
                                    <a href="<?= base_url(); ?>web/detailBerita/<?= $news['id']; ?>">
                                        <p class="card-text"><?= substr($news['deskripsi'], 0, 150); ?></p>
                                    </a>
                                    <p class="card-text">
                                        <small class="text-muted"><?= date('d F Y', $news['date_created']); ?></small>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <?php } elseif ($n % 2 == 1) { ?>
                        <div class="col-md-6">
                            <div class="card">
                                <a href="<?= base_url(); ?>web/detailBerita/<?= $news['id']; ?>">
                                    <img src="<?= base_url('assets/img/berita/') . $news['gambar']; ?>"
                                        class="card-img-top">
                                </a>
                                <div class="card-body">
                                    <h5 class="card-title"><?= $news['judul']; ?></h5>
                                    <a href="<?= base_url(); ?>web/detailBerita/<?= $news['id']; ?>">
                                        <p class="card-text"><?= substr($news['deskripsi'], 0, 150); ?></p>
                                    </a>
                                    <p class="card-text">
                                        <small class="text-muted"><?= date('d F Y', $news['date_created']); ?></small>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div> <br>

                    <?php }
						$n++;
					} ?>
                </div>
            </div>
        </div>

    </div>
</section>













































































































































<!-- End List Group -->