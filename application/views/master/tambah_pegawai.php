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
                  <h3 class="card-title">Tambah Data Pegawai</h3>
              </div>
              <div class="card-body col-md-6">
                  <form id="formTambah" action="" method="post" enctype="multipart/form-data">
                      <div class="modal-body">
                          <div class="form-group">
                              <label for="nip">NIP</label>
                              <input type="text" name="nip" class="form-control" id="nip" value="<?= set_value('nip'); ?>" placeholder="Isi NIP">
                              <small class="text-danger"><?= form_error('nip'); ?></small>
                          </div>
                          <div class="form-group">
                              <label for="nama_pegawai">Nama Pegawai</label>
                              <input type="text" name="nama_pegawai" class="form-control" id="nama_pegawai" value="<?= set_value('nama_pegawai'); ?>" placeholder="Isi Nama Pegawai">
                              <small class="text-danger"><?= form_error('nama_pegawai'); ?></small>
                          </div>
                          <div class="form-group">
                              <label for="id_jabatan">Pilih Jabatan</label>
                              <select class="form-control select2 select2-hidden-accessible" name="id_jabatan" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                  <?php foreach ($masterjabatan as $jb) :; ?>
                                      <option value="<?= $jb['id_jabatan']; ?>"><?= $jb['nama_jabatan']; ?></option>
                                  <?php endforeach; ?>
                              </select>
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
                              <div class="input-group date" id="reservationdate1" data-target-input="nearest">
                                  <input type="text" class="form-control datetimepicker-input" name="tanggal_lahir" data-target="#reservationdate1" value="<?= date('d-m-Y'); ?>" data-toggle="datetimepicker">
                                  <div class="input-group-append" data-target="#reservationdate1" data-toggle="datetimepicker">
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
                              <input type="text" name="nohp" class="form-control" id="nohp" value="<?= set_value('nohp'); ?>" placeholder="Isi No HP">
                              <small class="text-danger"><?= form_error('nohp'); ?></small>
                          </div>
                          <div class="form-group">
                              <label for="pendidikan">Pendidikan Terakhir</label>
                              <select class="form-control select2 select2-hidden-accessible" name="id_pendidikan" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                  <?php
                                    $masterpendidikan = $this->db->get('pendidikan')->result_array();
                                    foreach ($masterpendidikan as $pendidikan) :; ?>
                                      <option value="<?= $pendidikan['id_pendidikan']; ?>"><?= $pendidikan['nama_pendidikan']; ?></option>
                                  <?php endforeach; ?>
                              </select>
                              <small class="text-danger"><?= form_error('pendidikan'); ?></small>
                          </div>
                          <div class="form-group">
                              <label for="nohp">Terhitung Mulai Tanggal (TMT)</label>
                              <div class="input-group date" id="reservationdate2" data-target-input="nearest">
                                  <input type="text" class="form-control datetimepicker-input" name="tmt" data-target="#reservationdate2" value="<?= date('d-m-Y'); ?>" data-toggle="datetimepicker">
                                  <div class="input-group-append" data-target="#reservationdate2" data-toggle="datetimepicker">
                                      <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                  </div>
                              </div>
                          </div>
                          <div class="form-group">
                              <label for="foto">Pilih Ijazah</label>
                              <div class="custom-file">
                                  <input type="file" class="custom-file-input" id="ijazah" name="ijazah">
                                  <label class="custom-file-label" for="ijazah">Choose file</label>
                                  <small class="text-danger"><?= form_error('ijazah'); ?></small>
                              </div>
                          </div>
                          <div class="form-group">
                              <label for="foto">Pilih KTP</label>
                              <div class="custom-file">
                                  <input type="file" class="custom-file-input" id="ktp" name="ktp">
                                  <label class="custom-file-label" for="ktp">Choose file</label>
                                  <small class="text-danger"><?= form_error('ktp'); ?></small>
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
                              <label for="foto">Pilih Foto</label>
                              <div class="custom-file">
                                  <input type="file" class="custom-file-input" id="foto" name="foto">
                                  <label class="custom-file-label" for="foto">Choose file</label>
                                  <small class="text-danger"><?= form_error('foto'); ?></small>
                              </div>
                          </div>
                          <div class="form-group">
                              <label for="aktif">Status Pegawai</label>
                              <select class="form-control select2 select2-hidden-accessible" name="aktif" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                  <option value="1">Aktif</option>
                                  <option value="2">Tidak Aktif</option>
                              </select>
                          </div>
                      </div>
                      <div class="modal-footer justify-content-between">
                          <button type="button" class="btn btn-warning" onclick="window.location='<?= base_url('master/pegawai'); ?>'"><i class="fa fa-arrow-left"></i> Kembali</button>
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