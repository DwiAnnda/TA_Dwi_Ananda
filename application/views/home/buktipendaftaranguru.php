<script>
    window.print();
</script>
<!-- Main content -->
<div class="invoice">
    <!-- title row -->
    <div class="row">
        <div class="col-12" align="center">
            <table width="80%" align="center">
                <tr>
                    <td align="center"><?= strtoupper($judul); ?></td>
                </tr>
                <tr>
                    <td align="center"><?= strtoupper($profil['nama_profil']); ?></td>
                </tr>
            </table>
        </div>
    </div>
    <hr />

    <!-- Table row -->
    <div class="row">
        <div class="col-6">
            <table class="table" align="center" width="50%" border="0" cellpadding="2" cellspacing="2">
                <tbody>
                    <tr>
                        <td align="right">Kode</td>
                        <td align="center">:</td>
                        <td><?= $guru['kode']; ?></td>
                    </tr>
                    <tr>
                        <td align="right">Tanggal</td>
                        <td align="center">:</td>
                        <td><?= tanggal_indo($guru['tanggal']); ?></td>
                    </tr>
                    <tr>
                        <td align="right">Nama</td>
                        <td align="center">:</td>
                        <td><?= $guru['nama']; ?></td>
                    </tr>
                    <tr>
                        <td align="right">NIP</td>
                        <td align="center">:</td>
                        <td><?= $guru['nip']; ?></td>
                    </tr>
                    <tr>
                        <td align="right">Alamat</td>
                        <td align="center">:</td>
                        <td><?= $guru['alamat']; ?></td>
                    </tr>
                    <tr>
                        <td align="right">No HP</td>
                        <td align="center">:</td>
                        <td><?= $guru['nohp']; ?></td>
                    </tr>
                    <tr>
                        <td align="right">Email</td>
                        <td align="center">:</td>
                        <td><?= $guru['email']; ?></td>
                    </tr>
                    <tr>
                        <td colspan="3" align="center"><img src="<?= base_url('documents/') . $guru['kode'] . '.png'; ?>" height="200" /></td>
                    </tr>
                </tbody>
            </table>
            <center>
                <p><i>Harap Simpan dan Cetak Bukti Pendaftaran ini <br /> sebagai bukti pendaftaran guru </i><br />
                    Silahkan check email untuk memeriksa verifikasi pendaftaran dari admin
            </center>
        </div>
        <!-- /.col -->
    </div>
</div>