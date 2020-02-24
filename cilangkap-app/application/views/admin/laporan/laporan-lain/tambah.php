<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->

    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

    <?= form_open_multipart('laporan/tambahLaporan'); ?>

    <div class="form-group">
        <label for="nama">Nama Laporan</label>
        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama laporan..">
        <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
    </div>
    <div class="form-group">
        <label for="tahun">Tahun
            <select name="tahun" id="tahun" class="form-control">
                <?php
				$tahunSekarang = date('Y');
				for ($tahun = $tahunSekarang; $tahun >= 2010; $tahun--) : ?>
                <option value="<?= $tahun ?>"><?= $tahun ?></option>
                <?php endfor; ?>
            </select>
        </label>
    </div>
    <div class="form-group">
        <label for="jenis">Jenis Laporan</label>
        <input type="text" class="form-control" id="jenis" name="jenis" placeholder="Jenis laporan..">
        <?= form_error('jenis', '<small class="text-danger pl-3">', '</small>'); ?>
    </div>
    <div class="form-group">
        <label for="document">Upload File Document</label><br>
        <p class="badge badge-danger">*Ekstensi File yang dapat Diupload* .jpg .png .JPG .PNG .JPEG .pdf .xlsx .xls
            .docx .doc</p><br>
        <p class="badge badge-success">*Ukuran File Maksimal 10MB</p>
        <input type="file" class="form-control-file" id="document" name="document" required>
        <?= form_error('document', '<small class="text-danger pl-3">', '</small>'); ?>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
    </div>

    <?= form_close(); ?>
    <a href="<?= base_url('laporan/laporanLain'); ?>" class="badge badge-success"><i
            class="fas fa-arrow-circle-left"></i>
        Kembali</a>

</div>
<!-- /.container-fluid -->

</div>

















<!-- End of Main Content -->