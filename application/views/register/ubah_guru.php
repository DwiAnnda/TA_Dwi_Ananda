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
                  <h3 class="card-title">Ubah <?= $judul; ?></h3>
              </div>
              <div class="card-body col-md-6">
                  <form id="formTambah" action="" method="post" enctype="multipart/form-data">
                      <div class="modal-body">
                          <input type="hidden" name="id_guru" class="form-control" id="id_guru" value="<?= $guru['id_guru']; ?>">
                          <div class="form-group">
                              <label for="nip">NIP</label>
                              <input type="text" name="nip" class="form-control" id="nip" value="<?= $guru['nip']; ?>" placeholder="Isi NIP">
                              <small class="text-danger"><?= form_error('nip'); ?></small>
                          </div>
                          <div class="form-group">
                              <label for="nama">Nama</label>
                              <input type="text" name="nama" class="form-control" id="nama" value="<?= $guru['nama']; ?>" placeholder="Isi Nama">
                              <small class="text-danger"><?= form_error('nama'); ?></small>
                          </div>
                          <div class="form-group">
                              <label for="id_jeniskelamin">Pilih Jenis Kelamin</label>
                              <select class="form-control select2 select2-hidden-accessible" name="id_jeniskelamin" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                  <option value="<?= $guru['id_jeniskelamin']; ?>" selected="selected"><?= check_jeniskelamin($guru['id_jeniskelamin']); ?></option>
                                  <option value="1">Laki-laki</option>
                                  <option value="2">Perempuan</option>
                              </select>
                          </div>
                          <div class="form-group">
                              <label for="tempat_lahir">Tempat Lahir</label>
                              <input type="text" name="tempat_lahir" class="form-control" id="tempat_lahir" value="<?= $guru['tempat_lahir']; ?>" placeholder="Isi Tempat Lahir">
                              <small class="text-danger"><?= form_error('tempat_lahir'); ?></small>
                          </div>
                          <div class="form-group">
                              <label>Tanggal Lahir</label>
                              <div class="input-group date" id="reservationdate1" data-target-input="nearest">
                                  <input type="text" class="form-control datetimepicker-input" name="tanggal_lahir" data-target="#reservationdate1" data-toggle="datetimepicker" value="<?= date('d-m-Y', strtotime($guru['tanggal_lahir'])); ?>">
                                  <div class="input-group-append" data-target="#reservationdate1" data-toggle="datetimepicker">
                                      <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                  </div>
                              </div>
                          </div>
                          <div class="form-group">
                              <label for="alamat">Alamat</label>
                              <input type="text" name="alamat" class="form-control" id="alamat" value="<?= $guru['alamat']; ?>" placeholder="Isi Alamat">
                              <small class="text-danger"><?= form_error('alamat'); ?></small>
                          </div>
                          <div class="form-group">
                              <label for="nohp">No HP</label>
                              <input type="text" name="nohp" class="form-control" id="nohp" value="<?= $guru['nohp']; ?>" placeholder="Isi No HP">
                              <small class="text-danger"><?= form_error('nohp'); ?></small>
                          </div>
                          <div class="form-group">
                              <label for="email">Email</label>
                              <input type="email" name="email" class="form-control" id="email" value="<?= $guru['email']; ?>" placeholder="Isi Email">
                              <small class="text-danger"><?= form_error('email'); ?></small>
                          </div>
                          <div class="form-group">
                              <label for="password">Password (Kosongkan jika tidak inging mengubah)</label>
                              <input type="text" name="password" class="form-control" id="password" value="">
                              <small class="text-danger"><?= form_error('password'); ?></small>
                          </div>
                      </div>
                      <div class="modal-footer justify-content-between">
                          <button type="button" class="btn btn-warning" onclick="window.location='<?= base_url('register/guru'); ?>'"><i class="fa fa-arrow-left"></i> Kembali</button>
                          <button type="submit" class="btn btn-primary" onclick="return confirm('Anda yakin ingin mengubah data');"><i class="fa fa-save"></i> Simpan</button>
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