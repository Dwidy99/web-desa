<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->

    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

    <form action="laporan/ubah" method="post" enctype="multipart/form-data">

        <input type="hidden" name="id" value="<?= $anggaran['id']; ?>">

        <div class="form-group">
            <label for="nama_anggaran">Nama Anggaran</label>
            <input type="text" class="form-control" id="nama_anggaran" name="nama_anggaran"
                placeholder="Nama Anggaran.." value="<?= $anggaran['nama_anggaran']; ?>">
            <?= form_error('nama_anggaran', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
        <div class="form-group">
            <label for="skpd">Jenis Laporan Organisasi Perangkat Daerah (OPD)</label>
            <input type="text" class="form-control" id="skpd" name="skpd" placeholder="Jenis laporan skpd.."
                value="<?= $anggaran['skpd']; ?>">
            <?= form_error('skpd', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
        <div class="form-group">
            <label for="tahun">Tahun
                <select name="date_created" id="tahun" class="form-control">
                    <?php $tahunSekarang = date('Y');
					for ($tahun = $tahunSekarang; $tahun >= 2010; $tahun--) : ?>
                    <?php if ($tahun == $anggaran['date_created']) : ?>
                    <option value="<?= $anggaran['date_created']; ?>" selected><?= $anggaran['date_created']; ?>
                    </option>
                    <?php else : ?>
                    <option value="<?= $tahun ?>"><?= $tahun ?></option>
                    <?php endif; ?>
                    <?php endfor; ?>
                </select>
            </label>
        </div>
        <div class="form-group">
            <label for="document">Upload File Document</label><br>
            <p class="badge badge-danger">*Ekstensi File yang dapat Diupload* .jpg .png .JPG .PNG .JPEG .pdf .xlsx .xls
                .docx .doc</p><br>
            <p class="badge badge-info">*Ukuran File maksimal 10MB</p>
            <input type="file" class="form-control-file" id="document" name="document">
            <input type="hidden" class="form-control-file" name="old_document" value="<?= $anggaran['document']; ?>">
            <?= form_error('document', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
        </div>

    </form>

    <a href="<?= base_url('laporan'); ?>" class="badge badge-success float-lg-left"><i
            class="fas fa-arrow-circle-left"></i>
        Kembali</a>

</div>
<!-- /.container-fluid -->

</div>



































































<!-- End of Main Content -->