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
                  <h3 class="card-title">Tambah Data Tahun Ajaran</h3>
              </div>
              <div class="card-body col-md-6">
                  <form id="formTambah" action="" method="post">
                      <div class="modal-body">
                          <div class="form-group">
                              <label for="id_tahunajaran">Pilih Tahun Ajaran</label>
                              <select class="form-control select2 select2-hidden-accessible" name="id_tahunajaran" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                  <?php
                                    $tahunajaran = $this->Tahunajaran_model->getAlltahunajaran();
                                    foreach ($tahunajaran as $list) :; ?>
                                      <option value="<?= $list['id_tahunajaran']; ?>"><?= $list['nama_tahunajaran'] . '/' . $list['smester']; ?></option>
                                  <?php endforeach; ?>
                              </select>
                          </div>
                          <div class="form-group">
                              <label>Dari Tanggal</label>
                              <div class="input-group date" id="reservationdate1" data-target-input="nearest">
                                  <input type="text" class="form-control datetimepicker-input" name="dari_tanggal" data-target="#reservationdate1" value="<?= date('d-m-Y'); ?>" data-toggle="datetimepicker">
                                  <div class="input-group-append" data-target="#reservationdate1" data-toggle="datetimepicker">
                                      <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                  </div>
                              </div>
                          </div>
                          <div class="form-group">
                              <label>Sampai Tanggal</label>
                              <div class="input-group date" id="reservationdate2" data-target-input="nearest">
                                  <input type="text" class="form-control datetimepicker-input" name="sampai_tanggal" data-target="#reservationdate2" value="<?= date('d-m-Y'); ?>" data-toggle="datetimepicker">
                                  <div class="input-group-append" data-target="#reservationdate2" data-toggle="datetimepicker">
                                      <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="modal-footer justify-content-between">
                          <button type="button" class="btn btn-warning" onclick="window.location='<?= base_url('master/kalenderpendidikan'); ?>'"><i class="fa fa-arrow-left"></i> Kembali</button>
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