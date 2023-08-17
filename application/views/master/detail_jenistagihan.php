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
                              <td><?= $jenistagihan['kode']; ?></td>
                          </tr>
                          <tr>
                              <td>Nama Jenis Tagihan</td>
                              <td>:</td>
                              <td><?= $jenistagihan['nama_jenistagihan']; ?></td>
                          </tr>
                          <tr>
                              <td>Nominal</td>
                              <td>:</td>
                              <td><?= rupiah($jenistagihan['nominal']); ?></td>
                          </tr>
                      </tbody>
                  </table>
                  <div class="modal-footer justify-content-between">
                      <button type="button" class="btn btn-warning" onclick="window.location='<?= base_url('master/jenistagihan'); ?>'"><i class="fa fa-arrow-left"></i> Kembali</button>
                  </div>
              </div>
              <!-- /.card-body -->
          </div>
          <!-- /.card -->

      </section>
      <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->