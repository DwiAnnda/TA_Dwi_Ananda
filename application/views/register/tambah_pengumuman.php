  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
          <!-- NOTIF FLASH DISINI-->
      </section>

      <!-- Main content -->
      <section class="content">
          <!-- Default box -->
          <div class="card">
              <div class="card-header">
                  <h3 class="card-title">Tambah <?= $judul; ?></h3>
              </div>
              <div class="card-body col-md-6">
                  <form id="formTambah" action="" method="post">
                      <div class="modal-body">
                          <div class="form-group">
                              <label>Tanggal</label>
                              <div class="input-group date" id="reservationdate1" data-target-input="nearest">
                                  <input type="text" class="form-control datetimepicker-input" name="tanggal" data-target="#reservationdate1" value="<?= date('d-m-Y', strtotime(date('Y-m-d'))); ?>" data-toggle="datetimepicker">
                                  <div class="input-group-append" data-target="#reservationdate1" data-toggle="datetimepicker">
                                      <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                  </div>
                              </div>
                          </div>
                          <div class="form-group">
                              <label for="nomor_surat">Nomor Surat</label>
                              <input type="text" name="nomor_surat" class="form-control" id="nomor_surat" value="<?= set_value('nomor_surat'); ?>" placeholder="Isi Nomor Surat">
                              <small class="text-danger"><?= form_error('nomor_surat'); ?></small>
                          </div>
                          <div class="form-group">
                              <label for="perihal">Perihal</label>
                              <input type="text" name="perihal" class="form-control" id="perihal" value="<?= set_value('perihal'); ?>" placeholder="Isi Perihal Surat">
                              <small class="text-danger"><?= form_error('perihal'); ?></small>
                          </div>
                          <div class="form-group">
                              <label>Tanggal Pendaftaran</label>
                              <div class="input-group date" id="reservationdate2" data-target-input="nearest">
                                  <input type="text" class="form-control datetimepicker-input" name="tanggal_pendaftaran" data-target="#reservationdate2" value="<?= date('d-m-Y', strtotime(date('Y-m-d'))); ?>" data-toggle="datetimepicker">
                                  <div class="input-group-append" data-target="#reservationdate2" data-toggle="datetimepicker">
                                      <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                  </div>
                              </div>
                          </div>
                          <div class="form-group">
                              <label>Tanggal Akhir</label>
                              <div class="input-group date" id="reservationdate3" data-target-input="nearest">
                                  <input type="text" class="form-control datetimepicker-input" name="tanggal_akhir" data-target="#reservationdate3" value="<?= date('d-m-Y', strtotime(date('Y-m-d'))); ?>" data-toggle="datetimepicker">
                                  <div class="input-group-append" data-target="#reservationdate3" data-toggle="datetimepicker">
                                      <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                  </div>
                              </div>
                          </div>
                          <div class="form-group">
                              <label for="tempat">Tempat Pendaftaran</label>
                              <input type="text" name="tempat" class="form-control" id="tempat" value="<?= set_value('tempat'); ?>" placeholder="Isi Tempat Pendaftaran">
                              <small class="text-danger"><?= form_error('tempat'); ?></small>
                          </div>
                          <div class="form-group">
                              <label for="syarat">Syarat Pendaftaran</label>
                              <textarea type="text" name="syarat" class="form-control" id="syarat" placeholder="Isi Syarat Pendaftaran"><?= set_value('syarat'); ?></textarea>
                              <small class="text-danger"><?= form_error('syarat'); ?></small>
                          </div>
                          <div class="form-group">
                              <label for="kontak">Kontak</label>
                              <input type="text" name="kontak" class="form-control" id="kontak" value="<?= set_value('kontak'); ?>" placeholder="Isi Kontak Pendaftaran">
                              <small class="text-danger"><?= form_error('kontak'); ?></small>
                          </div>
                      </div>
                      <div class="modal-footer justify-content-between">
                          <button type="button" class="btn btn-warning" onclick="window.location='<?= base_url('register/pengumuman'); ?>'"><i class="fa fa-arrow-left"></i> Kembali</button>
                          <button type="submit" class="btn btn-primary" onclick="return confirm('Anda yakin ingin menambah data');"><i class="fa fa-save"></i> Simpan</button>
                      </div>
                  </form>
              </div>
              <!-- /.card-body -->
          </div>
          <!-- /.card -->

      </section>
      <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->