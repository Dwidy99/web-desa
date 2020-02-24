<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>


    <form action="" method="post">
        <input type="hidden" name="id" value="<?= $visi['id']; ?>">
        <div class="form-group">
            <label for="visi">Deskripsi Visi</label>
            <textarea class="form-control" name="visi" id="visi" rows="3"
                placeholder="Isi Visi disini.."><?= $visi['visi']; ?></textarea>
            <small class="form-text text-danger"><?= form_error('visi'); ?></small>
        </div>

        <div class="form-group">
            <button type="submit" name="ubah" class="btn btn-primary">Simpan</button>
        </div>
    </form>

    <a href="<?= base_url('admin/visi'); ?>" class="badge badge-success float-lg-left"><i
            class="fas fa-arrow-circle-left"></i>
        Kembali</a>

</div>
<!-- /.container-fluid -->

</div>







<!-- End of Main Content -->