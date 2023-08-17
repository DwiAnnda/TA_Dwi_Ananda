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
                  <h3 class="card-title">Tambah Absensi</h3>
              </div>
              <div class="card-body col-md-6">
                  <form id="formTambah" action="" method="post">
                      <input type="hidden" name="id_kelassiswa" class="form-control" id="id_kelassiswa" value="<?= $kelassiswa['id_kelassiswa']; ?>" readonly>
                      <div class="modal-body">
                          <div class="form-group">
                              <label>Tanggal</label>
                              <input type="text" name="tanggal" class="form-control" id="tanggal" value="<?= date('d-m-Y', strtotime(date('Y-m-d'))); ?>" readonly>
                          </div>
                          <div class="form-group">
                              <label for="jam">Jam Masuk</label>
                              <input type="text" name="jam" class="form-control" id="jam" maxlength="5" value="<?= date('H:i'); ?>" readonly>
                              <small class="text-danger"><?= form_error('jam'); ?></small>
                          </div>
                          <div class="form-group">
                              <label for="id_siswa">Nama Siswa</label>
                              <input type="hidden" name="id_siswa" class="form-control" id="id_siswa" value="<?= $siswa['id_siswa']; ?>" readonly>
                              <input type="text" name="nama_siswa" class="form-control" id="nama_siswa" value="<?= $siswa['nama_siswa']; ?>" readonly>
                              <small class="text-danger"><?= form_error('jam'); ?></small>
                          </div>
                          <div class="form-group">
                              <label for="id_status">Pilih Status Absensi</label>
                              <select class="form-control select2 select2-hidden-accessible" name="id_status" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                  <?php
                                    $status = $this->db->get_where('status')->result_array();
                                    foreach ($status as $sts) : ?>
                                      <option value="<?= $sts['id_status']; ?>"><?= $sts['nama_status']; ?></option>
                                  <?php endforeach; ?>
                              </select>
                          </div>
                      </div>
                      <div class="modal-footer justify-content-between">
                          <button type="button" class="btn btn-warning" onclick="window.location='<?= base_url('register/detail_kelassiswa/' . $kelassiswa['id_kelassiswa']); ?>'"><i class="fa fa-arrow-left"></i> Kembali</button>
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