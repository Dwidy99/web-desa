<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->

    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

    <form action="laporan/ubahLaporan" method="post" enctype="multipart/form-data">

        <input type="hidden" name="id" value="<?= $laporanLain['id']; ?>">

        <div class="form-group">
            <label for="nama">Nama Laporan</label>
            <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama laporan.."
                value="<?= $laporanLain['nama']; ?>">
            <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
        <div class="form-group">
            <label for="tahun">Tahun
                <select name="date_created" id="tahun" class="form-control">
                    <?php $tahunSekarang = date('Y');
					for ($tahun = $tahunSekarang; $tahun >= 2010; $tahun--) : ?>
                    <?php if ($tahun == $laporanLain['date_created']) : ?>
                    <option value="<?= $laporanLain['date_created']; ?>" selected><?= $laporanLain['date_created']; ?>
                    </option>
                    <?php else : ?>
                    <option value="<?= $tahun ?>"><?= $tahun ?></option>
                    <?php endif; ?>
                    <?php endfor; ?>
                </select>
            </label>
        </div>
        <div class="form-group">
            <label for="jenis">Jenis Laporan Organisasi Perangkat Daerah (OPD)</label>
            <input type="text" class="form-control" id="jenis" name="jenis" placeholder="Jenis laporan.."
                value="<?= $laporanLain['jenis']; ?>">
            <?= form_error('jenis', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
        <div class="form-group">
            <label for="document">Upload File Document</label><br>
            <p class="badge badge-danger">Ekstensi File yang dapat Diupload* .jpg .png .JPG .PNG .JPEG .pdf .xlsx .xls
                .docx .doc</p><br>
            <p class="badge badge-info">Ukuran File maksimal 10MB</p>
            <input type="file" class="form-control-file" id="document" name="document">
            <input type="hidden" class="form-control-file" name="old_document" value="<?= $laporanLain['document']; ?>">
            <!-- <?= form_error('document', '<small class="text-danger pl-3">', '</small>'); ?> -->
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