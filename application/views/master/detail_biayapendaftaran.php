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
                  <h3 class="card-title">Detail <?= $judul; ?></h3>
              </div>
              <div class="card-body col-md-6">
                  <table class="table table-sm">
                      <tbody>
                          <tr>
                              <td>Kode</td>
                              <td>:</td>
                              <td><?= $biayapendaftaran['kode']; ?></td>
                          </tr>
                          <tr>
                              <td>Tanggal</td>
                              <td>:</td>
                              <td><?= tanggal_indo($biayapendaftaran['tanggal']); ?></td>
                          </tr>
                          <tr>
                              <td>Biaya</td>
                              <td>:</td>
                              <td><?= rupiah($biayapendaftaran['biaya']); ?></td>
                          </tr>
                          <tr>
                              <td>Keterangan</td>
                              <td>:</td>
                              <td><?= $biayapendaftaran['keterangan']; ?></td>
                          </tr>
                      </tbody>
                  </table>
                  <div class="modal-footer justify-content-between">
                      <button type="button" class="btn btn-warning" onclick="window.location='<?= base_url('master/biayapendaftaran'); ?>'"><i class="fa fa-arrow-left"></i> Kembali</button>
                  </div>
              </div>
              <!-- /.card-body -->
          </div>
          <!-- /.card -->

      </section>
      <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->