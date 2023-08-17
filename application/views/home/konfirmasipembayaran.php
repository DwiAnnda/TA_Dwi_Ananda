<div class="col-4">
    <!-- /.login-logo -->
    <div class="card card-outline card-success">
        <div class="card-header text-center">
            <a href="#" class="h4"><?= $judul; ?></a>
        </div>
        <div class="card-body">
            <p class="login-box-msg">Silahkan cari data tagihan dengan memasukkan kode pendaftaran.</p>

            <div class="modal-body">
                <?= $this->session->flashdata('pesan_notifikasi'); ?>
                <?php
                if (!isset($kode)) {
                ?>
                    <form id="formTambah" action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="kode">Kode Pendaftaran</label>
                            <input type="hidden" name="id_input" class="form-control" id="id_input" value="1" readonly>
                            <input type="text" name="kode" class="form-control" id="kode" value="" placeholder="Isi kode">
                            <small class="text-danger"><?= form_error('kode'); ?></small>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-info"></i> Cari Data Tagihan</button>
                        </div>
                    </form>
                <?php
                }
                if (isset($kode)) {
                ?>
                    <form id="formTambah" action="" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id_input" class="form-control" id="id_input" value="2" readonly>
                        <input type="hidden" name="id_pendaftaran" class="form-control" id="id_pendaftaran" value="<?= $pendaftaran['id_pendaftaran']; ?>" readonly>
                        <input type="hidden" name="id_tagihan" class="form-control" id="id_tagihan" value="<?= $tagihan['id_tagihan']; ?>" readonly>
                        <?php
                        $jenistagihan = $this->Jenistagihan_model->getjenistagihanById($tagihan['id_jenistagihan']);
                        ?>
                        <div class="form-group">
                            <label for="id_jenistagihan">Jenis Tagihan</label>
                            <input type="hidden" name="id_jenistagihan" class="form-control" id="id_jenistagihan" value="<?= $jenistagihan['id_jenistagihan']; ?>" readonly>
                            <input type="text" name="nama_jenistagihan" class="form-control" id="nama_jenistagihan" value="<?= $jenistagihan['nama_jenistagihan']; ?>" readonly>
                            <small class="text-danger"><?= form_error('id_jenistagihan'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="nominal">Nominal</label>
                            <input type="text" name="nominal" class="form-control" id="nominal" value="<?= "Rp. " . number_format($tagihan['nominal'], 0, ',', '.'); ?>" readonly>
                            <small class="text-danger"><?= form_error('nominal'); ?></small>
                        </div>
                        <div class="form-group">
                            <label>Tanggal Kirim</label>
                            <div class="input-group date" id="reservationdate2" data-target-input="nearest">
                                <input type="text" class="form-control datetimepicker-input" name="tanggal" data-target="#reservationdate2" value="<?= date('d-m-Y'); ?>" data-toggle="datetimepicker">
                                <div class="input-group-append" data-target="#reservationdate2" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="atasnama">Nama Pengirim</label>
                            <input type="text" name="atasnama" class="form-control" id="atasnama" value="<?= set_value('atasnama'); ?>" placeholder="Isi Nama Pengirim">
                            <small class="text-danger"><?= form_error('atasnama'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="namabank">Nama Bank</label>
                            <input type="text" name="namabank" class="form-control" id="namabank" value="<?= set_value('namabank'); ?>" placeholder="Isi Nama Bank">
                            <small class="text-danger"><?= form_error('namabank'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="norekening">Nomor Rekening</label>
                            <input type="text" name="norekening" class="form-control" id="norekening" value="<?= set_value('norekening'); ?>" placeholder="Isi Nomor Rekening">
                            <small class="text-danger"><?= form_error('norekening'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="file">Pilih Bukti Pembayaran</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="file" name="file">
                                <label class="custom-file-label" for="file">Pilih File</label>
                                <small class="text-danger"><?= form_error('file'); ?></small>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-warning btn-lg" onclick="window.location='<?= base_url('home'); ?>'"><i class="fa fa-arrow-left"></i> Kembali Beranda</button>
                            <button type="submit" class="btn btn-primary btn-lg" onclick="return confirm('Apakah data yang masukkan sudah benar? Mohon diteliti lagi jika sudah terkirim maka data tidak bisa diubah!');"><i class="fa fa-save"></i> Konfirmasi</button>
                        </div>
                    </form>
                <?php } ?>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
<!-- /.login-box -->