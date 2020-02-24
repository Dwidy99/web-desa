<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->

    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

    <a href="<?= base_url('berita/tambah') ?>" class="btn btn-primary">Tambah Berita</a><br>
    <hr><br>

    <?php if ($this->session->flashdata('message')) : ?>
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?= $this->session->flashdata('message'); ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <p class="badge badge-success">*Berita Akan Ditampilkan Berdasarkan Data Terbaru</p>

    <?php foreach ($berita as $news) : ?>

    <div class="card mb-3" style="max-width: 940px;">
        <div class="row no-gutters">
            <div class="col-md-4">
                <img src="<?= base_url('assets/img/berita/') . $news['gambar']; ?>" class="card-img">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title"><?= $news['judul']; ?></h5>
                    <p class="card-text"><?= substr($news['deskripsi'], 0, 100); ?></p>
                    <p class="card-text"><small class="text-muted"><?= date('d F Y', $news['date_created']); ?></small>
                    </p>
                    <a href="<?= base_url(); ?>berita/detail/<?= $news['id']; ?>" class="badge badge-success"><i
                            class="fas fa-info-circle">
                            Detail Berita
                        </i></a> |
                    <a href="<?= base_url(); ?>berita/ubah/<?= $news['id']; ?>" class="badge badge-info"><i
                            class="fas fa-pen">
                            Ubah Data Berita
                        </i></a> |
                    <a href="<?= base_url(); ?>berita/hapus/<?= $news['id']; ?>" class="badge badge-danger"
                        onclick="return confirm('Anda yakin akan menghapus berita yang dipilih?')">
                        <i class="fas fa-trash-alt"></i> Hapus Berita
                    </a>
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


    <!-- INI TABLE -->
    <!-- <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">No.</th>
                <th scope="col">Gambar</th>
                <th scope="col">Judul</th>
                <th scope="col" width="400px">Deskripsi</th>
                <th scope="col">Date Created</th>
                <th scope="col" width="120px">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
			foreach ($berita as $news) : ?>
            <tr>
                <th scope="row"><?= $no++; ?></th>
                <td>
                    <img src="<?= base_url('assets/img/berita/') . $news['gambar']; ?>" class="img-thumbnail">
                </td>
                <td><?= $news['judul']; ?></td>
                <td><?= substr($news['deskripsi'], 0, 100); ?></td>
                <td><?= date('d F Y', $news['date_created']); ?></td>
                <td>
                    <a href="<?= base_url(); ?>berita/hapus/<?= $news['id']; ?>" class="badge badge-info"><i
                            class="fas fa-info-circle"></i></a>
                    <a href="<?= base_url(); ?>berita/ubah/<?= $news['id']; ?>" class="badge badge-warning"><i
                            class="fas fa-edit"></i></a> | <a href="<?= base_url(); ?>berita/hapus/<?= $news['id']; ?>"
                        class="badge badge-danger"
                        onclick="return confirm('Anda yakin menghapus berita yang dipilih?')"><i
                            class="fas fa-trash-alt"></i></a>
                </td>
            </tr>
            <?php endforeach; ?>
    </tbody>
    </table> -->

</div>
<!-- /.container-fluid -->

</div>






























































































<!-- End of Main Content -->