  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
          <!-- NOTIF FLASH DISINI-->
          <?php if ($this->session->flashdata()) : ?>
              <!-- right column -->
              <div class="col-md-12">
                  <div class="alert alert-success alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                      <h5><i class="icon fas fa-check"></i> Notifikasi!</h5>
                      Data berhasil <?= $this->session->flashdata('flashdata'); ?>
                  </div>
              </div>
              <!--/.col (right) -->
          <?php endif; ?>
      </section>

      <!-- Main content -->
      <section class="content">
          <!-- Default box -->
          <div class="card">
              <div class="card-header">
                  <h3 class="card-title"><?= $judul; ?></h3>
              </div>
              <div class="card-body col-6">
                  <form id="formTambah" action="" method="post" enctype="multipart/form-data">
                      <?php
                        $siswa = $this->Siswa_model->getsiswaById($pembayaran['id_siswa']);
                        ?>
                      <div class="form-group">
                          <label for="nama_siswa">Siswa</label>
                          <input type="text" name="nama_siswa" class="form-control" id="nama_siswa" value="<?= $siswa['nama']; ?>" readonly>
                          <small class="text-danger"><?= form_error('nominal'); ?></small>
                      </div>
                      <div class="form-group">
                          <label for="nominal">Nominal</label>
                          <input type="text" name="nominal" class="form-control" id="nominal" value="<?= "Rp. " . number_format($pembayaran['nominal'], 0, ',', '.'); ?>" readonly>
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
                          <button type="button" class="btn btn-warning" onclick="window.location='<?= base_url('tagihan/' . $les['id_les']); ?>'"><i class="fa fa-arrow-left"></i> Kembali</button>
                          <button type="submit" class="btn btn-primary" onclick="return confirm('Apakah data yang masukkan sudah benar? Mohon diteliti lagi jika sudah terkirim maka data tidak bisa diubah!');"><i class="fa fa-save"></i> Konfirmasi</button>
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