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
                  <h3 class="card-title">Tambah Data <?= $judul; ?></h3>
              </div>
              <div class="card-body col-md-6">
                  <form id="formTambah" action="" method="post">
                      <div class="modal-body">
                          <?php
                            $queryKode = $this->db->query("SELECT max(kode_pengeluaran) as kodeTerbesar FROM pengeluaran")->row_array();
                            $kodepengeluaran = $queryKode['kodeTerbesar'];
                            $urutan = (int) substr($kodepengeluaran, 2, 5);
                            $urutan++;
                            $huruf = "PN";
                            $kodepengeluaran = $huruf . sprintf("%05s", $urutan);
                            ?>
                          <div class="form-group">
                              <label for="kode_pengeluaran">Kode Pengeluaran</label>
                              <input type="text" name="kode_pengeluaran" class="form-control" id="kode_pengeluaran" value="<?= $kodepengeluaran; ?>" placeholder="Isi Kode Pengeluaran">
                              <small class="text-danger"><?= form_error('kode_pengeluaran'); ?></small>
                          </div>
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
                              <label for="id_sumberpengeluaran">Pilih Sumber Pengeluaran</label>
                              <select class="form-control select2 select2-hidden-accessible" name="id_sumberpengeluaran" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                  <?php foreach ($sumberpengeluaran as $brg) :; ?>
                                      <option value="<?= $brg['id_sumberpengeluaran']; ?>"><?= $brg['nama_sumberpengeluaran']; ?></option>
                                  <?php endforeach; ?>
                              </select>
                          </div>
                          <div class="form-group">
                              <label for="nominal">Nominal</label>
                              <input type="text" name="nominal" class="form-control" id="nominal" value="<?= set_value('nominal'); ?>" placeholder="Isi nominal">
                              <small class="text-danger"><?= form_error('nominal'); ?></small>
                          </div>
                          <div class="form-group">
                              <label for="keterangan">Keterangan</label>
                              <input type="text" name="keterangan" class="form-control" id="keterangan" value="<?= set_value('keterangan'); ?>" placeholder="Isi keterangan">
                              <small class="text-danger"><?= form_error('keterangan'); ?></small>
                          </div>
                      </div>
                      <div class="modal-footer justify-content-between">
                          <button type="button" class="btn btn-warning" onclick="window.location='<?= base_url('register/pengeluaran'); ?>'"><i class="fa fa-arrow-left"></i> Kembali</button>
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