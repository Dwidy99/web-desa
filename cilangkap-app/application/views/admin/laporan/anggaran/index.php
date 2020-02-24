<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

    <div class="form-froup">
        <a href="<?= base_url('laporan/tambah'); ?>" class="btn btn-primary">Tambah Laporan</a><br>
        <hr>
    </div>

    <?php if ($this->session->flashdata('anggaran')) : ?>
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?= $this->session->flashdata('anggaran'); ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <table class="table table-bordered table-striped table-hover text-center table-sm">
        <thead class="thead-dark">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Tahun</th>
                <th>SKPD</th>
                <th>Download Document</th>
                <th>Aksi</th>
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
                <td>
                    <a href="<?= base_url(); ?>laporan/ubah/<?= $budget['id']; ?>" class="badge badge-info"><i
                            class="fas fa-pen">
                            Ubah Data
                        </i></a> |
                    <a href="<?= base_url(); ?>laporan/hapus/<?= $budget['id']; ?>" class="badge badge-danger"
                        onclick="return confirm('Anda yakin akan menghapus data yang dipilih?')">
                        <i class="fas fa-trash-alt"></i> Hapus Data
                    </a>
                </td>
            </tr>
        </tbody>
        <?php endforeach; ?>
    </table>

    <div class="row">
        <div class="col">
            <?= $this->pagination->create_links(); ?>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
















</div>

<!-- End of Main Content -->