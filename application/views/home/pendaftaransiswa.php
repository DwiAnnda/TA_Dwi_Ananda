<div class="col-4">
    <?= $this->session->flashdata('pesan_notifikasi'); ?>
    <!-- /.login-logo -->
    <div class="card card-outline card-success">
        <div class="card-header text-center">
            <a href="#" class="h4"><?= $judul; ?></a>
        </div>
        <div class="card-body">
            <p class="login-box-msg">Lengkapi form dibawah ini dengan benar dan jelas.</p>

            <div class="modal-body">
                <form id="formTambah" action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="nis">NIS</label>
                        <input type="text" name="nis" class="form-control" id="nis" value="<?= set_value('nis'); ?>" placeholder="Isi NIS">
                        <small class="text-danger"><?= form_error('nis'); ?></small>
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" class="form-control" id="nama" value="<?= set_value('nama'); ?>" placeholder="Isi Nama">
                        <small class="text-danger"><?= form_error('nama'); ?></small>
                    </div>
                    <div class="form-group">
                        <label for="id_jeniskelamin">Pilih Jenis Kelamin</label>
                        <select class="form-control" name="id_jeniskelamin" style="width: 100%;" tabindex="-1" aria-hidden="true">
                            <option value="1">Laki-laki</option>
                            <option value="2">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tempat_lahir">Tempat Lahir</label>
                        <input type="text" name="tempat_lahir" class="form-control" id="tempat_lahir" value="<?= set_value('tempat_lahir'); ?>" placeholder="Isi Tempat Lahir">
                        <small class="text-danger"><?= form_error('tempat_lahir'); ?></small>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Lahir</label>
                        <div class="input-group date" id="reservationdate2" data-target-input="nearest">
                            <input type="text" class="form-control datetimepicker-input" name="tanggal_lahir" data-target="#reservationdate2" value="<?= date('d-m-Y'); ?>" data-toggle="datetimepicker">
                            <div class="input-group-append" data-target="#reservationdate2" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" name="alamat" class="form-control" id="alamat" value="<?= set_value('alamat'); ?>" placeholder="Isi Alamat">
                        <small class="text-danger"><?= form_error('alamat'); ?></small>
                    </div>
                    <div class="form-group">
                        <label for="nohp">No HP</label>
                        <input type="text" name="nohp" class="form-control" id="nohp" value="<?= set_value('nohp'); ?>" placeholder="Isi Nomor HP">
                        <small class="text-danger"><?= form_error('nohp'); ?></small>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" name="email" class="form-control" id="email" value="<?= set_value('email'); ?>" placeholder="Isi Email">
                        <small class="text-danger"><?= form_error('email'); ?></small>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-warning btn-lg" onclick="window.location='<?= base_url('home'); ?>'"><i class="fa fa-arrow-left"></i> Kembali Beranda</button>
                        <button type="submit" class="btn btn-primary btn-lg" onclick="return confirm('Apakah data yang masukkan sudah benar? Mohon diteliti lagi jika sudah terkirim maka data tidak bisa diubah!');"><i class="fa fa-save"></i> Kirim Pendaftaran</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
<!-- /.login-box -->