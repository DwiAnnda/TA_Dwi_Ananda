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
                              <td>Tanggal</td>
                              <td>:</td>
                              <td><?= tanggal_indo($pengumuman['tanggal']); ?></td>
                          </tr>
                          <tr>
                              <td>Nomor Surat</td>
                              <td>:</td>
                              <td><?= $pengumuman['nomor_surat']; ?></td>
                          </tr>
                          <tr>
                              <td>Perihal Surat</td>
                              <td>:</td>
                              <td><?= $pengumuman['perihal']; ?></td>
                          </tr>
                          <tr>
                              <td>Tanggal Pendaftaran</td>
                              <td>:</td>
                              <td><?= tanggal_indo($pengumuman['tanggal_pendaftaran']); ?></td>
                          </tr>
                          <tr>
                              <td>Tanggal Akhir</td>
                              <td>:</td>
                              <td><?= tanggal_indo($pengumuman['tanggal_akhir']); ?></td>
                          </tr>
                          <tr>
                              <td>Tempat Pendaftaran</td>
                              <td>:</td>
                              <td><?= $pengumuman['tempat']; ?></td>
                          </tr>
                          <tr>
                              <td>Syarat Pendaftaran</td>
                              <td>:</td>
                              <td><?= $pengumuman['syarat']; ?></td>
                          </tr>

                          <tr>
                              <td>Kontak</td>
                              <td>:</td>
                              <td><?= $pengumuman['kontak']; ?></td>
                          </tr>
                      </tbody>
                  </table>
                  <div class="modal-footer justify-content-between">
                      <button type="button" class="btn btn-warning" onclick="window.location='<?= base_url('register/pengumuman'); ?>'"><i class="fa fa-arrow-left"></i> Kembali</button>
                  </div>
              </div>
              <!-- /.card-body -->
          </div>
          <!-- /.card -->

      </section>
      <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->