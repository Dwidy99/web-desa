<!-- Anggaran Table -->

<section class="table-anggaran">

    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-md-10 mx-auto">
                <h2 class="display-5">
                    <strong>Anggaran</strong>
                </h2>
                <hr>
                <div class="jumbotron bg-light">
                    <h3 class="display-5">Daftar Anggaran</h3>
                    <p>Berikut adalah seluruh daftar anggaran yang telah diupload. Silankan klik tombol <span
                            class="badge badge-success">download</span> untuk mengunduh file.</p>

                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover text-center table-sm">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Tahun</th>
                                    <th>SKPD</th>
                                    <th>Download Document</th>
                                </tr>
                            </thead>
                            <?php $no = $this->uri->segment('3') + 1;
							foreach ($anggaran as $budget) : ?>
                            <tbody>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $budget['nama_anggaran']; ?></td>
                                    <td><?= $budget['tahun']; ?></td>
                                    <td><?= $budget['skpd']; ?></td>
                                    <td><a href="<?= base_url(); ?>laporan/download/<?= $budget['document'];; ?>"
                                            class="badge badge-success">download</a>
                                    </td>
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