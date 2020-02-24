<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

    <?php if ($this->session->flashdata('misi')) : ?>
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?= $this->session->flashdata('misi'); ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <div class="row mb-3">
        <div class="col-md-6">
            <a href="<?= base_url('admin/tambah'); ?>" class="btn btn-primary">Tambah Data</a>
        </div>
    </div>
    <hr>

    <table class="table table-bordered table-striped table-hover text-center table-sm">
        <tr class="text-center">
            <th scope="col">No</th>
            <th scope="col">Misi Ke</th>
            <th scope="col">Misi</th>
            <th scope="col" colspan="3">Action</th>
        </tr>
        <?php $no = 1;
		foreach ($misi as $m) : ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= $m['no']; ?></td>
            <td><?= substr($m['misi'], 0, 90); ?></td>
            <td colspan="4">
                <a href="<?= base_url(); ?>admin/detail/<?= $m['id']; ?>" class="badge badge-success"><i
                        class="fas fa-info-circle"> Detail</i></a>
                <a href="<?= base_url(); ?>admin/ubahMisi/<?= $m['id']; ?>" class="badge badge-info"><i
                        class="fas fa-edit"> Ubah</i></a>
                <a href="<?= base_url(); ?>admin/hapus/<?= $m['id']; ?>" class="badge badge-danger"
                    onclick="return confirm('Anda yakin?');"><i class="fas fa-trash-alt"> Hapus</i></a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>

</div>
<!-- /.container-fluid -->

</div>










































































































<!-- End of Main Content -->