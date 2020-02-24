<!-- Plan -->

<section>

    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-md-10 mx-auto">
                <h2 class="display-5">
                    <strong>Program Unggulan</strong>
                </h2>
                <hr>
                <div class="jumbotron">
                    <h3 class="display-5">Program Unggulan Desa Cilangkap</h3>
                    <?php foreach ($program as $p) : ?>
                    <p>
                        <b><?= $p['no']; ?></b>
                        <br>
                        <?= $p['deskripsi']; ?>
                    </p>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>

</section>

<!-- End Plan -->
