<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->

    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

    <?= form_open_multipart('laporan/tambah'); ?>

    <div class="form-group">
        <label for="nama_anggaran">Nama Anggaran</label>
        <input type="text" class="form-control" id="nama_anggaran" name="nama_anggaran" placeholder="Nama anggaran..">
        <?= form_error('nama_anggaran', '<small class="text-danger pl-3">', '</small>'); ?>
    </div>
    <div class="form-group">
        <label for="tahun">Tahun
            <select name="tahun" id="tahun" class="form-control">
                <?php
				$thn_skr = date('Y');
				for ($x = $thn_skr; $x >= 2010; $x--) : ?>
                <option value="<?= $x ?>"><?= $x ?></option>
                <?php endfor; ?>
            </select>
        </label>
    </div>
    <div class="form-group">
        <label for="skpd">Jenis Laporan Organisasi Perangkat Daerah (OPD)</label>
        <input type="text" class="form-control" id="skpd" name="skpd" placeholder="Jenis laporan skpd..">
        <?= form_error('skpd', '<small class="text-danger pl-3">', '</small>'); ?>
    </div>
    <div class="form-group">
        <label for="document">Upload File Document</label><br>
        <p class="badge badge-danger">*Ekstensi File yang dapat Diupload* .jpg .png .JPG .PNG .JPEG .pdf .xlsx .xls
            .docx .doc</p><br>
        <p class="badge badge-success">*Ukuran File Maksimal 10MB</p>
        <input type="file" class="form-control-file" id="document" name="document">
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary" name="simpan">Tambah Data</button>
    </div>

    <?= form_close(); ?>
    <a href="<?= base_url('laporan'); ?>" class="badge badge-success"><i class="fas fa-arrow-circle-left"></i>
        Kembali</a>

</div>
<!-- /.container-fluid -->

</div>


<!-- End of Main Content -->
