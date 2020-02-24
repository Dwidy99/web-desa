<!-- Anggaran Table -->

<section class="table-anggaran">

    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-md-10 mx-auto">
                <h2 class="display-5">
                    <strong>Kepegawaian</strong>
                </h2>
                <hr>
                <div class="jumbotron bg-light">
                    <h3 class="display-5">Daftar Kepegawaian</h3>
                    <p>Berikut adalah seluruh daftar pegawai di Desa Cilangkap:</p>

                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover text-center table-sm">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th>No Telepon</th>
                                </tr>
                            </thead>
                            <?php $no = $this->uri->segment('3') + 1;
							foreach ($kepegawaian as $pegawai) : ?>
                            <tbody>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $pegawai['nama']; ?></td>
                                    <td><?= $pegawai['alamat']; ?></td>
                                    <td><?= $pegawai['telepon']; ?></td>
                                </tr>
                            </tbody>
                            <?php endforeach; ?>
                        </table>
                    </div>

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

<!-- End Plan -->
