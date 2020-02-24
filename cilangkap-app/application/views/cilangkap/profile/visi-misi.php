<!-- Profile -->
<section class="profileVisiMisi">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-md-10 mx-auto">
                <h2 class="display-5"><b>Visi & Misi Desa Cilangkap</b></h2>
                <hr>

                <div class="jumbotron">
                    <h3 class="display-5">Visi</h3>
                    <hr>
                    <p><b><?= $visi['visi']; ?></b></p>
                    <h3 class="display-5">Misi</h3>
                    <hr>
                    <ul>
                        <?php foreach ($misi as $m) : ?>
                        <li>
                            <h5><strong><?= $m['no']; ?></strong> <?= $m['misi']; ?></h5>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Profile -->
