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
                  <h3 class="card-title">Ubah Data <?= $judul; ?></h3>
              </div>
              <div class="card-body col-md-6">
                  <form id="formTambah" action="" method="post">
                      <input type="hidden" name="id_pemasukan" class="form-control" id="id_pemasukan" value="<?= $pemasukan['id_pemasukan']; ?>">
                      <div class="modal-body">
                          <div class="form-group">
                              <label for="kode_pemasukan">Kode Pemasukan</label>
                              <input type="text" name="kode_pemasukan" class="form-control" id="kode_pemasukan" value="<?= $pemasukan['kode_pemasukan']; ?>" placeholder="Isi Kode Pemasukan" disabled>
                              <small class="text-danger"><?= form_error('kode_pemasukan'); ?></small>
                          </div>
                          <div class="form-group">
                              <label>Tanggal</label>
                              <div class="input-group date" id="reservationdate1" data-target-input="nearest">
                                  <input type="text" class="form-control datetimepicker-input" name="tanggal" data-target="#reservationdate1" data-toggle="datetimepicker" value="<?= date('d-m-Y', strtotime($pemasukan['tanggal'])); ?>">
                                  <div class="input-group-append" data-target="#reservationdate1" data-toggle="datetimepicker">
                                      <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                  </div>
                              </div>
                          </div>
                          <div class="form-group">
                              <label for="id_sumberpemasukan">Pilih Sumber Pemasukan</label>
                              <select class="form-control select2 select2-hidden-accessible" name="id_sumberpemasukan" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                  <?php foreach ($sumberpemasukan as $brg) :; ?>
                                      <?php
                                        if ($brg['id_sumberpemasukan'] == $pemasukan['id_sumberpemasukan']) {

                                        ?>
                                          <option value="<?= $brg['id_sumberpemasukan']; ?>" selected="selected"><?= $brg['nama_sumberpemasukan']; ?></option>
                                      <?php
                                        } else {
                                        ?>
                                          <option value="<?= $brg['id_sumberpemasukan']; ?>"><?= $brg['nama_sumberpemasukan']; ?></option>
                                      <?php
                                        }
                                        ?>
                                  <?php endforeach; ?>
                              </select>
                          </div>
                          <div class="form-group">
                              <label for="nominal">Nominal</label>
                              <input type="hidden" name="nominalold" class="form-control" id="nominalold" value="<?= $pemasukan['nominal']; ?>">
                              <input type="text" name="nominal" class="form-control" id="nominal" value="<?= $pemasukan['nominal']; ?>" placeholder="Isi nominal">
                              <small class="text-danger"><?= form_error('nominal'); ?></small>
                          </div>
                          <div class="form-group">
                              <label for="keterangan">Keterangan</label>
                              <input type="text" name="keterangan" class="form-control" id="keterangan" value="<?= $pemasukan['keterangan']; ?>" placeholder="Isi keterangan">
                              <small class="text-danger"><?= form_error('keterangan'); ?></small>
                          </div>
                      </div>
                      <div class="modal-footer justify-content-between">
                          <button type="button" class="btn btn-warning" onclick="window.location='<?= base_url('register/pemasukan'); ?>'"><i class="fa fa-arrow-left"></i> Kembali</button>
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