  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
          <!-- NOTIF FLASH DISINI-->
          <?= $this->session->flashdata('pesan_notifikasi'); ?>
      </section>

      <!-- Main content -->
      <section class="content">
          <!-- Default box -->
          <div class="card">
              <div class="card-header">
                  <h3 class="card-title">Tambah <?= $judul; ?></h3>
              </div>
              <div class="card-body col-md-6">
                  <form id="formTambah" action="" method="post" enctype="multipart/form-data">
                      <div class="modal-body">
                          <div class="form-group">
                              <label>Tanggal</label>
                              <div class="input-group date" id="reservationdate1" data-target-input="nearest">
                                  <input type="text" class="form-control datetimepicker-input" name="tanggal" data-target="#reservationdate1" value="<?= date('d-m-Y'); ?>" data-toggle="datetimepicker">
                                  <div class="input-group-append" data-target="#reservationdate1" data-toggle="datetimepicker">
                                      <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                  </div>
                              </div>
                          </div>
                          <div class="form-group">
                              <label for="nik">NIK</label>
                              <input type="text" name="nik" class="form-control" id="nik" value="<?= set_value('nik'); ?>" placeholder="Isi NIK">
                              <small class="text-danger"><?= form_error('nik'); ?></small>
                          </div>
                          <div class="form-group">
                              <label for="nokk">No KK</label>
                              <input type="text" name="nokk" class="form-control" id="nokk" value="<?= set_value('nokk'); ?>" placeholder="Isi Nama Siswa">
                              <small class="text-danger"><?= form_error('nokk'); ?></small>
                          </div>
                          <div class="form-group">
                              <label for="nama_siswa">Nama Calon Siswa</label>
                              <input type="text" name="nama_siswa" class="form-control" id="nama_siswa" value="<?= set_value('nama_siswa'); ?>" placeholder="Isi Nama Siswa">
                              <small class="text-danger"><?= form_error('nama_siswa'); ?></small>
                          </div>
                          <div class="form-group">
                              <label for="id_jeniskelamin">Pilih Jenis Kelamin</label>
                              <select class="form-control select2 select2-hidden-accessible" name="id_jeniskelamin" style="width: 100%;" tabindex="-1" aria-hidden="true">
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
                              <label for="anak_ke">Anak Ke</label>
                              <input type="number" name="anak_ke" class="form-control" id="anak_ke" value="<?= set_value('anak_ke'); ?>" placeholder="Isi Anak Ke">
                              <small class="text-danger"><?= form_error('anak_ke'); ?></small>
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
                          <div class="form-group">
                              <label for="ijazah">Pilih Ijazah</label>
                              <div class="custom-file">
                                  <input type="file" class="custom-file-input" id="ijazah" name="ijazah">
                                  <label class="custom-file-label" for="ijazah">Choose file</label>
                                  <small class="text-danger"><?= form_error('ijazah'); ?></small>
                              </div>
                          </div>
                          <div class="form-group">
                              <label for="foto">Pilih KK</label>
                              <div class="custom-file">
                                  <input type="file" class="custom-file-input" id="kk" name="kk">
                                  <label class="custom-file-label" for="kk">Choose file</label>
                                  <small class="text-danger"><?= form_error('kk'); ?></small>
                              </div>
                          </div>
                          <div class="form-group">
                              <label for="akta">Pilih Akta</label>
                              <div class="custom-file">
                                  <input type="file" class="custom-file-input" id="akta" name="akta">
                                  <label class="custom-file-label" for="akta">Choose file</label>
                                  <small class="text-danger"><?= form_error('akta'); ?></small>
                              </div>
                          </div>
                          <div class="form-group">
                              <label for="foto">Pilih Foto</label>
                              <div class="custom-file">
                                  <input type="file" class="custom-file-input" id="foto" name="foto">
                                  <label class="custom-file-label" for="foto">Choose file</label>
                                  <small class="text-danger"><?= form_error('foto'); ?></small>
                              </div>
                          </div>
                      </div>
                      <div class="modal-footer justify-content-between">
                          <button type="button" class="btn btn-warning" onclick="window.location='<?= base_url('register/calonsiswa'); ?>'"><i class="fa fa-arrow-left"></i> Kembali</button>
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